<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Notifications\RegisterEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProviderDashboard extends Controller
{
    public function dashboard(Request $request){
        $provider = session()->get('provider');
        if(is_null($provider)){
            return \redirect()->route('provider.login');
        }
        return view('provider/provider-dashboard', ['provider' => $provider]);
    }

}
