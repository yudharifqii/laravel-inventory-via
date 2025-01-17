<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            switch (Auth::user()->role) {
                case 'Administrator':
                    return redirect()->route('dashboardPage');
                case 'User':
                    return redirect()->route('dashboardPage');
                default:
                    return redirect()->route('loginPage')->with('error', 'Role tidak ada!');
            }
        } else {
            return redirect()->route('loginPage')->with('error', 'Email atau Password yang Anda masukkan salah!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
