<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Notifications\RegisterEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProviderLoginController extends Controller
{

    public function showLoginForm()
    {
        if (!is_null(session()->get('provider'))){
            return Redirect::route('provider.dashboard');
        }
        return view('provider/provider_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required|string|max:191'
        ]);

        $attempt = Auth::guard('provider')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
        if (!$attempt) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
        $provider = Provider::where('email', $request->get('email'))->first();
        if (is_null($provider)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
        return $this->authAndSuccess($provider);
    }

    protected function authAndSuccess($provider)
    {
        auth()->guard('provider')->login($provider, true);
        session()->put('provider', $provider);
        return Redirect::route('provider.dashboard');
    }

    public function logout(Request $request){
        session()->pull('provider');
        return \redirect()->route('provider.login');
    }

    public function dashboard(Request $request){
        $provider = session()->get('provider');
        if(is_null($provider)){
            return \redirect()->route('provider.login');
        }
        return view('provider/provider-dashboard', ['provider' => $provider]);
    }

}
