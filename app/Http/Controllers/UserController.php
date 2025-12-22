<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LIST USER
    public function index(Request $request)
    {
        $query = User::with('warga');

        // 🔍 Search (nama user, email, NIK warga)
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('warga', function ($w) use ($search) {
                        $w->where('no_ktp', 'like', "%{$search}%")
                            ->orWhere('pekerjaan', 'like', "%{$search}%");
                    });
            });
        }

        // SEARCH (nama user / no KTP)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhereHas('warga', function ($w) use ($request) {
                        $w->where('no_ktp', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // FILTER ROLE
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $dataUser = $query->paginate(12)->withQueryString();

        return view('pages.user.index', compact('dataUser'));
    }


    // FORM TAMBAH USER
    public function create()
    {
        return view('pages.user.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                // USER
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'required|string',

                // WARGA
                'no_ktp' => 'nullable|string|max:50',
                'nama' => 'nullable|string|max:255',
                'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
                'agama' => 'nullable|string|max:50',
                'pekerjaan' => 'nullable|string|max:100',
                'telp' => 'nullable|string|max:20',
                'email_warga' => 'nullable|email|max:255',
            ],
            [
                // USER
                'name.required' => 'Nama user wajib diisi.',
                'name.string' => 'Nama user harus berupa teks.',
                'name.max' => 'Nama user maksimal 255 karakter.',
                'email.required' => 'Email user wajib diisi.',
                'email.email' => 'Format email user tidak valid.',
                'email.unique' => 'Email user sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.string' => 'Password harus berupa teks.',
                'password.min' => 'Password minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sesuai.',
                'role.required' => 'Role wajib dipilih.',

                // WARGA
                'no_ktp.max' => 'Nomor KTP maksimal 50 karakter.',
                'nama.max' => 'Nama lengkap maksimal 255 karakter.',
                'jenis_kelamin.in' => 'Jenis kelamin harus laki-laki atau perempuan.',
                'agama.max' => 'Agama maksimal 50 karakter.',
                'pekerjaan.max' => 'Pekerjaan maksimal 100 karakter.',
                'telp.max' => 'Nomor telepon maksimal 20 karakter.',
                'email_warga.email' => 'Format email warga tidak valid.',
                'email_warga.max' => 'Email warga maksimal 255 karakter.',
            ]
        );


        DB::beginTransaction();

        try {
            // ======================
            // CREATE USER
            // ======================
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            // ======================
            // CREATE WARGA (OPSIONAL)
            // ======================
            if ($request->filled('no_ktp') || $request->filled('nama')) {
                Warga::create([
                    'user_id' => $user->id,
                    'no_ktp' => $request->no_ktp,
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'agama' => $request->agama,
                    'pekerjaan' => $request->pekerjaan,
                    'telp' => $request->telp,
                    'email' => $request->email_warga,
                ]);
            }

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User dan data warga berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }


    // DETAIL USER
    public function show($id)
    {
        $user = User::with('warga')->findOrFail($id);
        return view('pages.user.detail', compact('user'));
    }


    // FORM EDIT USER
    public function edit($id)
    {
        $user = User::with('warga')->findOrFail($id);

        return view('pages.user.edit', compact('user'));
    }


    // UPDATE USER
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                // USER
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'role' => 'required|string',

                // WARGA
                'no_ktp' => 'nullable|string|max:50',
                'nama' => 'nullable|string|max:255',
                'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
                'agama' => 'nullable|string|max:50',
                'pekerjaan' => 'nullable|string|max:100',
                'telp' => 'nullable|string|max:20',
                'email_warga' => 'nullable|email|max:255',
            ],
            [
                // USER
                'name.required' => 'Nama user wajib diisi.',
                'name.string' => 'Nama user harus berupa teks.',
                'name.max' => 'Nama user maksimal 255 karakter.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email maksimal 255 karakter.',
                'role.required' => 'Role wajib dipilih.',
                'role.string' => 'Role tidak valid.',

                // WARGA
                'no_ktp.max' => 'Nomor KTP maksimal 50 karakter.',
                'nama.max' => 'Nama lengkap maksimal 255 karakter.',
                'jenis_kelamin.in' => 'Jenis kelamin harus laki-laki atau perempuan.',
                'agama.max' => 'Agama maksimal 50 karakter.',
                'pekerjaan.max' => 'Pekerjaan maksimal 100 karakter.',
                'telp.max' => 'Nomor telepon maksimal 20 karakter.',
                'email_warga.email' => 'Format email warga tidak valid.',
                'email_warga.max' => 'Email warga maksimal 255 karakter.',
            ]
        );

        // ======================
        // UPDATE USER
        // ======================
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        // ======================
        // UPDATE / CREATE WARGA
        // ======================
        Warga::updateOrCreate(
            ['user_id' => $user->id],
            [
                'no_ktp' => $request->no_ktp,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'telp' => $request->telp,
                'email' => $request->email_warga,
            ]
        );

        return redirect()
            ->route('users.show', $user->id)
            ->with('success', 'Data user dan warga berhasil diperbarui');
    }


    // HAPUS USER
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $user = User::with('warga')->findOrFail($id);

            // Hapus data warga jika ada
            if ($user->warga) {
                $user->warga->delete();
            }

            // Hapus user
            $user->delete();

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User dan data warga berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('users.index')
                ->with('error', 'Gagal menghapus data user');
        }
    }
}
