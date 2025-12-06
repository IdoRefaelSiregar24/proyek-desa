<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use App\Models\Tahapan;
use Illuminate\Http\Request;
use App\Models\TahapanProyek;

class TahapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function listTahapan($proyek_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);
        $tahapan = Tahapan::where('proyek_id', $proyek_id)->get();
        return view('pages.tahapan.index', compact('proyek', 'tahapan'));
    }

    public function index()
    {
        return view('pages.tahapan.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function show(string $proyek_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);
        return view('pages.tahapan.create', compact('proyek'));
    }
    public function createTahapan($proyekId)
    {
        $proyek = Proyek::findOrFail($proyekId);

        return view('pages.tahapan.create', compact('proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'nama_tahap' => 'required|string|max:255',
            'target_persen' => 'required|numeric|min:0|max:100',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'thumbnail' => 'nullable|image|max:10240', // max 10MB
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf|max:51200', // max 50MB per file
        ]);

        // Buat tahapan
        $tahapan = Tahapan::create([
            'proyek_id' => $request->proyek_id,
            'nama_tahap' => $request->nama_tahap,
            'target_persen' => $request->target_persen,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        // Upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $path = $file->store('tahapan_thumbnails', 'public');

            $tahapan->medias()->create([
                'file_name' => $path,
                'sort_order' => 0, // Thumbnail selalu urutan 0
                'ref_table' => 'tahapan',
            ]);
        }

        // Upload media tambahan
        if ($request->hasFile('media_files')) {
            $sortOrder = 1; // Mulai dari 1 setelah thumbnail
            foreach ($request->file('media_files') as $file) {
                $path = $file->store('tahapan_media', 'public');

                $tahapan->medias()->create([
                    'file_name' => $path,
                    'sort_order' => $sortOrder,
                    'ref_table' => 'tahapan',
                ]);

                $sortOrder++;
            }
        }

        return redirect()->route('detail-proyek', $request->proyek_id)
            ->with('success', 'Tahapan proyek berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tahapan = Tahapan::findOrFail($id);
        $proyek = Proyek::findOrFail($tahapan->proyek_id);
        return view('pages.tahapan.edit', compact('tahapan', 'proyek'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update2(Request $request, $proyek_id, $tahap_id)
    {
        $tahapan = Tahapan::findOrFail($tahap_id);
        $proyek = Proyek::findOrFail($proyek_id);

        // validasi
        $request->validate([
            'nama_tahap' => 'required|string|max:255',
            'target_persen' => 'required|numeric|min:0|max:100',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf|max:51200',
        ]);

        $tahapan->update([
            'nama_tahap' => $request->nama_tahap,
            'target_persen' => $request->target_persen,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        // upload thumbnail & media tambahan seperti sebelumnya
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $path = $file->store('tahapan_thumbnails', 'public');

            $oldThumbnail = $tahapan->medias()->where('sort_order', 0)->first();
            if ($oldThumbnail) {
                if (\Storage::disk('public')->exists($oldThumbnail->file_name)) {
                    \Storage::disk('public')->delete($oldThumbnail->file_name);
                }
                $oldThumbnail->delete();
            }

            $tahapan->medias()->create([
                'file_name' => $path,
                'sort_order' => 0,
                'ref_table' => 'tahapan',
            ]);
        }

        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $path = $file->store('tahapan_media', 'public');
                $tahapan->medias()->create([
                    'file_name' => $path,
                    'sort_order' => 1,
                    'ref_table' => 'tahapan',
                ]);
            }
        }

        return redirect()->route('detail-proyek', $proyek->proyek_id)
            ->with('success', 'Data tahapan proyek berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tahapan = Tahapan::findOrFail($id);
        $proyek_id = $tahapan->proyek_id;
        $tahapan->delete();

        return redirect()->route('detail-proyek', $proyek_id)
            ->with('success', 'Data tahapan proyek berhasil dihapus!');
    }
}
