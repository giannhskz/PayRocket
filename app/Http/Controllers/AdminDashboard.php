<?php


namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{

    public function getDashboard(Request $request)
    {
        $admin = session()->get('admin');
        if(is_null($admin)){
            return \redirect()->route('admin.login');
        }
        return view('admin/admin-dashboard', ['admin' => $admin]);
    }

    public function addProvider(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:providers|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Create a new provider
        $provider = new Provider();
        $provider->name = $validatedData['name'];
        $provider->email = $validatedData['email'];
        $provider->password = bcrypt($validatedData['password']); // Hash the password

        // Save the provider to the database
        $provider->save();

        // Redirect back to the admin dashboard or any other page
        return redirect()->route('admin.dashboard')->with('success', 'Provider added successfully');
    }

    public function deleteProvider(Provider $provider)
    {
        // Delete the provider from the database
        $provider->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Provider deleted successfully');
    }
}
