<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Warga;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $warga = Warga::where('user_id', $user->id)->first();
        return view("pages.warga.index", compact('warga'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|numeric|max:14',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'telp' => 'required|string',
            'email' => 'required|email',
        ],[
            'agama.required' => 'kolom agama harus diisi',
            'email.email' => 'Format email tidak valid',
            'no_ktp.numeric' => 'No KTP harus berupa angka',
            'no_ktp.max' => 'No KTP maksimal 14 digit',
            'nama.required' => 'kolom nama harus diisi',
            'jenis_kelamin.required' => 'kolom jenis kelamin harus diisi',
            'pekerjaan.required' => 'kolom pekerjaan harus diisi',
            'telp.required' => 'kolom telepon harus diisi',
            'email.required' => 'kolom email harus diisi',
        ]);

        $user = Auth::user();

        Warga::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'no_ktp' => $request->no_ktp,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'telp' => $request->telp,
                'email' => $request->email,
            ]
        );

        return redirect()->route('warga-guest.index')->with('success', 'Data profil berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $warga = Warga::where('user_id', $id)->firstOrFail();
        return view('pages.warga.edit', compact('warga'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telp' => 'required|string|max:20',
            'no_ktp' => 'required|numeric',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
        ],[
            'nama.required' => 'kolom nama harus diisi',
            'email.required' => 'kolom email harus diisi',
            'email.email' => 'Format email tidak valid',
            'telp.required' => 'kolom telepon harus diisi',
            'no_ktp.required' => 'kolom No KTP harus diisi',
            'no_ktp.numeric' => 'No KTP harus berupa angka',
            'jenis_kelamin.required' => 'kolom jenis kelamin harus diisi',
            'agama.required' => 'kolom agama harus diisi',
            'pekerjaan.required' => 'kolom pekerjaan harus diisi',
        ]);

        $user = Auth::user();

        // Update tabel user
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
        ]);

        // Update atau buat data warga
        Warga::updateOrCreate(
            ['user_id' => $user->id],
            [
                'no_ktp' => $request->no_ktp,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'telp' => $request->telp,
                'email' => $request->email,
            ]
        );

        return redirect()->route('warga-guest.index')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
