<?php

namespace App\Http\Controllers;

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
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'nama_tahap' => 'required|string|max:255',
            'target_persen' => 'required|numeric|min:0|max:100',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
        ]);

        Tahapan::create([
            'proyek_id' => $request->proyek_id,
            'nama_tahap' => $request->nama_tahap,
            'target_persen' => $request->target_persen,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        return redirect()->route('detail-proyek', $request->proyek_id)
            ->with('success', 'Tahapan proyek berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $proyek_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);
        return view('pages.tahapan.create', compact('proyek'));
    }

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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_tahap' => 'required|string|max:255',
            'target_persen' => 'required|numeric|min:0|max:100',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
        ]);

        $tahapan = Tahapan::findOrFail($id);
        $tahapan->update([
            'nama_tahap' => $request->nama_tahap,
            'target_persen' => $request->target_persen,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        return redirect()->route('detail-proyek', $tahapan->proyek_id)
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
