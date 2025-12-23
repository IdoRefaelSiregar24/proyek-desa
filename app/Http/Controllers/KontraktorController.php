<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use App\Models\Kontraktor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kontraktor::with('logo');

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $dataKontraktor = $query
            ->orderBy('kontraktor_id', 'desc')
            ->paginate(12);

        return view('pages.kontraktor.index', compact('dataKontraktor'));
    }

    public function Kontraktor()
    {
        $proyekTerbanyak = DB::table('proyek')->select(
            'proyek.*',
            DB::raw('(SELECT COUNT(*) FROM kontraktor WHERE kontraktor.proyek_id = proyek.proyek_id) as total_kontraktor')
        )->orderByDesc('total_kontraktor')->take(5)->get();

        return view('pages.kontraktor.kontraktor', compact('proyekTerbanyak'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataProyek = Proyek::orderBy('nama_proyek')->get();
        return view('pages.kontraktor.create', compact('dataProyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'penanggung_jawab' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'proyek_id' => 'required|exists:proyek,proyek_id',

            'logo' => 'required|image',
            'media_files.*' => 'nullable|file',
        ]);

        // 1. Simpan data kontraktor
        $kontraktor = Kontraktor::create([
            'proyek_id' => $request->proyek_id,
            'nama' => $request->nama,
            'penanggung_jawab' => $request->penanggung_jawab,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ]);

        // 2. Simpan logo (thumbnail)
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('media', 'public');

            Media::create([
                'ref_table' => 'kontraktor',
                'ref_id' => $kontraktor->kontraktor_id,
                'file_name' => $logoPath,
                'mime_type' => $logo->getClientMimeType(),
                'sort_order' => 0, // logo
            ]);
        }

        // 3. Simpan media tambahan
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $index => $file) {
                $path = $file->store('media', 'public');

                Media::create([
                    'ref_table' => 'kontraktor',
                    'ref_id' => $kontraktor->kontraktor_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()
            ->route('kontraktor.index')
            ->with('success', 'Kontraktor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kontraktor = Kontraktor::with('proyek')->findOrFail($id);

        $medias = Media::where('ref_table', 'kontraktor')
            ->where('ref_id', $id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.kontraktor.show', compact('kontraktor', 'medias'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kontraktor = Kontraktor::with('media')->findOrFail($id);

        $medias = $kontraktor->media;
        $dataProyek = Proyek::orderBy('nama_proyek')->get();

        return view('pages.kontraktor.edit', compact(
            'kontraktor',
            'medias',
            'dataProyek'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // ================= VALIDASI =================
        $request->validate([
            'nama' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string',
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'logo' => 'nullable|image|max:50000',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:50000',
        ]);

        // ================= AMBIL KONTRAKTOR =================
        $kontraktor = Kontraktor::findOrFail($id);

        // ================= UPDATE DATA UTAMA =================
        $kontraktor->update($request->only([
            'nama',
            'penanggung_jawab',
            'kontak',
            'alamat',
            'proyek_id',
        ]));

        // ================= UPDATE LOGO =================
        if ($request->hasFile('logo')) {

            // cari logo lama (sort_order = 0)
            $oldLogo = Media::where('ref_table', 'kontraktor')
                ->where('ref_id', $kontraktor->kontraktor_id)
                ->where('sort_order', 0)
                ->first();

            // hapus file & record lama
            if ($oldLogo) {
                if (Storage::disk('public')->exists($oldLogo->file_name)) {
                    Storage::disk('public')->delete($oldLogo->file_name);
                }
                $oldLogo->delete();
            }

            // simpan logo baru
            $logo = $request->file('logo');
            $logoPath = $logo->store('media', 'public');

            Media::create([
                'ref_table' => 'kontraktor',
                'ref_id' => $kontraktor->kontraktor_id,
                'file_name' => $logoPath,
                'mime_type' => $logo->getClientMimeType(),
                'sort_order' => 0,
            ]);
        }

        // ================= MEDIA TAMBAHAN =================
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $path = $file->store('media', 'public');

                Media::create([
                    'ref_table' => 'kontraktor',
                    'ref_id' => $kontraktor->kontraktor_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order' => Media::where('ref_table', 'kontraktor')
                        ->where('ref_id', $kontraktor->kontraktor_id)
                        ->max('sort_order') + 1,
                ]);
            }
        }

        return redirect()
            ->route('kontraktor.show', $kontraktor->kontraktor_id)
            ->with('success', 'Perubahan kontraktor berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
