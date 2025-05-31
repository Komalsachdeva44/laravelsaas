<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantRegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'subdomain' => 'required|alpha_dash|unique:tenants,subdomain',
        ]);

        // Here, insert logic to:
        // - Create user
        // - Create subdomain record (e.g., in `tenants` table)
        // - Create tenant database and tables

        // For now, simulate redirect:
        return redirect()->route('register.form')->with('success', 'Tenant registered. Visit http://' . $request->subdomain . '.localhost');
    }
}
