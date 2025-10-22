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
        return view("guest.warga.index", compact('warga'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|numeric',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'telp' => 'required|string',
            'email' => 'required|email',
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


        return redirect()->route('warga.index')->with('success', 'Data profil berhasil disimpan.');
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
        return view('guest.warga.edit', compact('warga'));
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

        return redirect()->route('warga.index')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
