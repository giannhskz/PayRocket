<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminLoginController extends Controller
{

    public function showLoginForm()
    {
        if (!is_null(session()->get('admin'))){
            return Redirect::route('admin.dashboard');
        }
        return view('admin/admin-login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === 'admin@admin.com' && $password === 'admin') {
            session()->put('admin', 'admin@Admin');
            return Redirect::route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        session()->pull('admin');
        return \redirect()->route('admin.login');
    }


}
