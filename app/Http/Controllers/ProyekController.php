<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumn = ['sumber_dana'];

        $data['dataProyek'] = Proyek::filter($request, $filterableColumn)
            ->paginate(10)->onEachSide(2)
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
    public function detail(string $id)
    {
        // ambil satu proyek beserta relasi tahapan + progress
        $proyek = Proyek::with(['tahapan.progress'])->findOrFail($id);

        // kirim variabel $proyek ke view
        return view('pages.proyek.detail', compact('proyek'));
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
