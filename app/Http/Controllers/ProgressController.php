<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use App\Models\Tahapan;
use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progress = Progress::all();
        $proyek = Proyek::first();

        return view('pages.progress.index', compact('progress', 'proyek'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function createProgress($proyek_id)
    {
        $proyek = Proyek::with('tahapan')->findOrFail($proyek_id);

        $tahapan = $proyek->tahapan;

        if ($tahapan->isEmpty()) {
            return redirect()
                ->back()
                ->with('error', 'Belum ada tahapan untuk proyek ini. Silakan tambahkan tahapan terlebih dahulu.');
        }

        return view('pages.progress.create', compact('proyek', 'tahapan'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'media_files.*' => 'nullable|mimes:jpg,jpeg,png,gif,pdf|max:51200',
        ]);

        // INSERT PROGRESS
        $progress = Progress::create([
            'proyek_id' => $request->proyek_id,
            'tahap_id' => $request->tahap_id,
            'persen_real' => $request->persen_real,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
        ]);

        // Upload thumbnail → sort_order 0
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('progress/thumbnail', 'public');

            $progress->medias()->create([
                'file_name' => $path,
                'sort_order' => 0,
                'ref_table' => 'progres_proyek',
            ]);
        }

        // Upload media multiple (mulai dari 1)
        if ($request->hasFile('media_files')) {
            $order = 1;
            foreach ($request->file('media_files') as $file) {
                $path = $file->store('progress/media', 'public');

                $progress->medias()->create([
                    'file_name' => $path,
                    'sort_order' => $order++,
                    'ref_table' => 'progres_proyek',
                ]);
            }
        }

        return redirect()
            ->route('detail-proyek', $request->proyek_id)
            ->with('success', 'Progress berhasil ditambahkan!');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $progress = Progress::findOrFail($id);
        $proyek = $progress->proyek;
        $tahapan = Tahapan::where('proyek_id', $proyek->proyek_id)->get();

        return view('pages.progress.edit', compact('progress', 'proyek', 'tahapan'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $progress = Progress::findOrFail($id);

        // Validasi form
        $request->validate([
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf|max:51200',
        ]);

        // update data progress
        $progress->update([
            'tahap_id' => $request->tahap_id,
            'persen_real' => $request->persen_real,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
        ]);

        if ($request->hasFile('thumbnail')) {

            $old = $progress->medias()->where('sort_order', 0)->first();
            if ($old) {
                if (\Storage::disk('public')->exists($old->file_name)) {
                    \Storage::disk('public')->delete($old->file_name);
                }
                $old->delete();
            }

            $path = $request->file('thumbnail')->store('progress_thumbnails', 'public');

            $progress->medias()->create([
                'file_name' => $path,
                'sort_order' => 0,
                'ref_table' => 'progres_proyek',
            ]);
        }

        if ($request->hasFile('media_files')) {

            // ambil urutan terakhir supaya tidak bentrok
            $lastOrder = $progress->medias()->max('sort_order') ?? 0;
            $next = $lastOrder + 1;

            foreach ($request->file('media_files') as $file) {
                $path = $file->store('progress_media', 'public');

                $progress->medias()->create([
                    'file_name' => $path,
                    'sort_order' => $next++,
                    'ref_table' => 'progres_proyek',
                ]);
            }
        }

        return redirect()
            ->route('detail-proyek', $progress->proyek_id)
            ->with('success', 'Progress berhasil diperbarui!');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $progress = Progress::where('progres_id', $id)->firstOrFail();

        $proyek_id = $progress->proyek_id;

        $progress->delete();

        return redirect()
            ->route('detail-proyek', $proyek_id)
            ->with('success', 'Progress berhasil dihapus!');
    }

}
