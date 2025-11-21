<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Tahapan;
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
        $data['dataProyek'] = $query
            ->paginate(10)
            ->onEachSide(2)
            ->withQueryString();

        return view('pages.proyek.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data['kode_proyek'] = $request->kode_proyek;
        $data['nama_proyek'] = $request->nama_proyek;
        $data['tahun'] = $request->tahun;
        $data['lokasi'] = $request->lokasi;
        $data['anggaran'] = $request->anggaran;
        $data['sumber_dana'] = $request->sumber_dana;
        $data['deskripsi'] = $request->deskripsi;

        Proyek::create($data);

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
        $proyek = Proyek::findOrFail($id);

        $tahapan = $proyek->tahapan()
            ->with([
                'progress' => function ($q) use ($request) {
                    $q->filter($request)
                        ->orderBy('tanggal', 'desc');
                }
            ])
            ->paginate(2)
            ->withQueryString();

        return view('pages.proyek.detail', compact('proyek', 'tahapan', 'request'));
    }





    public function getProgress($id, Request $request)
    {
        $t = Tahapan::findOrFail($id);

        // paginasi progress per tahapan
        $progressPaginated = $t->progress()
            ->orderBy('tanggal', 'desc')
            ->paginate(3, ['*'], 'page', $request->page ?? 1);

        return view('pages.proyek.progress-item', [
            't' => $t,
            'progressPaginated' => $progressPaginated
        ])->render();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $tahap_id)
    {
        $data['proyek'] = Proyek::findOrFail($tahap_id);
        return view('pages.proyek.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $proyek_id = $id;
        $proyek = Proyek::findOrFail($proyek_id);

        $proyek->kode_proyek = $request->kode_proyek;
        $proyek->nama_proyek = $request->nama_proyek;
        $proyek->tahun = $request->tahun;
        $proyek->lokasi = $request->lokasi;
        $proyek->anggaran = $request->anggaran;
        $proyek->sumber_dana = $request->sumber_dana;
        $proyek->deskripsi = $request->deskripsi;

        $proyek->save();
        return redirect()->route('proyek-guest.index')->with('success', 'Perubahan Data Berhasil!');
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
