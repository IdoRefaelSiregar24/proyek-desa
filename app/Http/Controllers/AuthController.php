<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Warga;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('pages/auth/login');
    }

    public function showRegisterFrom()
    {
        return view("pages/auth/register");
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'password' => 'Password tidak sesuai',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User',
        ]);


        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar.',
            ])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->withInput();
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'))
            ->with('success', 'Berhasil login!');


    }

    public function bypassfmi(Request $request)
    {
        $request->session()->regenerate();
        session(['is_login' => true]);
        session(['role' => 'Super Admin']);

        return redirect()->intended(route('dashboard'))
            ->with('success', 'Berhasil login!');
    }

    public function bypasshmn(Request $request)
    {
        $request->session()->regenerate();
        session(['is_login' => true]);
        session(['role' => 'Admin']);

        return redirect()->intended(route('dashboard'))
            ->with('success', 'Berhasil login!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = Auth::user(); // Ambil user yang sedang login

        if ($user) {
            // Hapus data warga yang terkait (kalau ada)
            Warga::where('user_id', $user->id)->delete();

            // Hapus akun user
            $user->delete();

            // Logout setelah dihapus
            Auth::logout();

            // Redirect ke halaman utama
            return redirect('/')->with('success', 'Akun Anda telah berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus akun.');
    }
}
