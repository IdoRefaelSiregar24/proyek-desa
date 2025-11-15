<?php

namespace App\Http\Controllers;

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
            'catatan' => 'nullable|string'
        ]);

        // Simpan progress ke database
        Progress::create([
            'proyek_id' => $request->proyek_id,
            'tahap_id' => $request->tahap_id,
            'persen_real' => $request->persen_real,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
        ]);

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
        // Validasi form
        $request->validate([
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string'
        ]);

        // Cari progress berdasarkan primary key progress_id
        $progress = Progress::findOrFail($id);

        // Update data progress
        $progress->update([
            'tahap_id' => $request->tahap_id,
            'persen_real' => $request->persen_real,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
        ]);

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
