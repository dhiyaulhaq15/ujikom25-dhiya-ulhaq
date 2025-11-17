<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/admin');
            } elseif ($user->role === 'member') {
                return redirect()->intended('/member');
            } else {
                return redirect()->intended('/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => request()->name,
            'role' => 'member',
            'email' => request()->email,
            'password' => Hash::make(request()->password),
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
