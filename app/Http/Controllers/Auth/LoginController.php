<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
           'email' => 'required|email',
           'password' => 'required|string'
        ]);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
        {
            return redirect()->route('users.index');
        } else {
            return  redirect()->back()->with('message', 'Login or password incorrect');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
