<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use App\Models\Tahapan;
use App\Models\LokasiProyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumn = ['sumber_dana', 'tahun'];

        // Ambil daftar tahun dari DB
        $data['listTahun'] = Proyek::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        // Query awal
        $query = Proyek::query();

        // Filter sumber_dana & tahun
        $query = $query->filter($request, $filterableColumn);

        // SEARCH
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_proyek', 'LIKE', "%{$search}%")
                    ->orWhere('kode_proyek', 'LIKE', "%{$search}%")
                    ->orWhere('lokasi', 'LIKE', "%{$search}%")
                    ->orWhere('sumber_dana', 'LIKE', "%{$search}%");
            });
        }

        // Pagination
        $dataProyek = $query->paginate(10)->onEachSide(2)->withQueryString();
        $data['dataProyek'] = $dataProyek;

        // Ambil semua thumbnail untuk proyek yang ada di halaman ini
        $thumbnails = Media::where('ref_table', 'proyek')
            ->whereIn('ref_id', $dataProyek->pluck('proyek_id'))
            ->where('sort_order', 0)
            ->get()
            ->keyBy('ref_id');

        $data['thumbnails'] = $thumbnails;


        return view('pages.proyek.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {

        $request->validate([
            'kode_proyek' => 'required',
            'nama_proyek' => 'required',
            'tahun' => 'required|numeric',
            'lokasi' => 'required',
            'anggaran' => 'required|numeric',
            'sumber_dana' => 'required',
            'deskripsi' => 'required',

            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'geojson' => 'nullable|json',

            'thumbnail' => 'required|image',
        ]);


        $proyek = Proyek::create([
            'kode_proyek' => $request->kode_proyek,
            'nama_proyek' => $request->nama_proyek,
            'tahun' => $request->tahun,
            'lokasi' => $request->lokasi,
            'anggaran' => $request->anggaran,
            'sumber_dana' => $request->sumber_dana,
            'deskripsi' => $request->deskripsi,
        ]);

        LokasiProyek::create([
            'proyek_id' => $proyek->proyek_id,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'geojson' => $request->geojson,
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $thumbPath = $thumb->store('media', 'public');

            Media::create([
                'ref_table' => 'proyek',
                'ref_id' => $proyek->proyek_id,
                'file_name' => $thumbPath,
                'mime_type' => $thumb->getClientMimeType(),
                'sort_order' => 0,
            ]);
        }

        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $index => $file) {
                $path = $file->store('media', 'public');

                Media::create([
                    'ref_table' => 'proyek',
                    'ref_id' => $proyek->proyek_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('proyek-guest.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('pages.proyek.create');
    }

    /**
     * Display the specified resource.
     */
    public function detail(Request $request, string $id)
    {
        $proyek = Proyek::with('lokasiProyek')->findOrFail($id);

        $tahapan = $proyek->tahapan()
            ->filter($request)
            ->with('progress')
            ->paginate(2)
            ->withQueryString();

        $medias = Media::where('ref_table', 'proyek')
            ->where('ref_id', $proyek->proyek_id)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('pages.proyek.detail', compact('proyek', 'tahapan', 'medias'));
    }



    public function getProgress($id, Request $request)
    {
        $t = Tahapan::findOrFail($id);

        // Ambil proyek dari tahapan
        $proyek = $t->proyek;

        $progressPaginated = $t->progress()
            ->orderBy('tanggal', 'desc')
            ->paginate(3, ['*'], 'page', $request->page ?? 1);

        return view('pages.proyek.progress-item', [
            't' => $t,
            'proyek' => $proyek, // ← WAJIB ADA !!
            'progressPaginated' => $progressPaginated
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $proyek_id)
    {
        $data['proyek'] = Proyek::with('lokasiProyek')->findOrFail($proyek_id);


        $data['medias'] = Media::where('ref_table', 'proyek')
            ->where('ref_id', $data['proyek']->proyek_id)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('pages.proyek.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'kode_proyek' => 'required|string|max:50',
            'nama_proyek' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'anggaran' => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'thumbnail' => 'nullable|image|max:50000',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf|max:50000',
        ]);

        // Ambil proyek
        $proyek = Proyek::with('lokasiProyek')->findOrFail($id);

        // Update data proyek
        $proyek->update($request->only([
            'kode_proyek',
            'nama_proyek',
            'tahun',
            'lokasi',
            'anggaran',
            'sumber_dana',
            'deskripsi',
        ]));

        // Update lokasi proyek
        if ($proyek->lokasiProyek) {
            $proyek->lokasiProyek->update($request->only(['lat', 'lng', 'geojson']));
        } else {
            // Jika belum ada, buat baru
            $proyek->lokasiProyek()->create($request->only(['lat', 'lng', 'geojson']));
        }

        // Upload thumbnail baru jika ada
        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $thumbPath = $thumb->store('media', 'public');

            // Hapus thumbnail lama (sort_order = 0) jika ada
            $oldThumb = Media::where('ref_table', 'proyek')
                ->where('ref_id', $proyek->proyek_id)
                ->where('sort_order', 0)
                ->first();

            if ($oldThumb) {
                if (\Storage::disk('public')->exists($oldThumb->file_name)) {
                    \Storage::disk('public')->delete($oldThumb->file_name);
                }
                $oldThumb->delete();
            }

            // Simpan thumbnail baru
            Media::create([
                'ref_table' => 'proyek',
                'ref_id' => $proyek->proyek_id,
                'file_name' => $thumbPath,
                'mime_type' => $thumb->getClientMimeType(),
                'sort_order' => 0,
            ]);
        }



        // Upload media tambahan
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $index => $file) {
                $path = $file->store('media', 'public');

                Media::create([
                    'ref_table' => 'proyek',
                    'ref_id' => $proyek->proyek_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order' => Media::where('ref_table', 'proyek')
                        ->where('ref_id', $proyek->proyek_id)
                        ->max('sort_order') + 1,
                ]);
            }
        }

        return redirect()->route('detail-proyek', $proyek->proyek_id)
            ->with('success', 'Perubahan proyek berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();
        return redirect()->route('proyek-guest.index')->with('success', 'Data berhasil dihapus!');
    }
}
