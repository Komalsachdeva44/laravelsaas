<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Tenant;

class TenantRegisterController extends Controller
{
     public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Custom logic for tenant login
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Auth login (session-based)
            Auth::login($user);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Step 1: Validate form input validate input so that user cant fill miss or wrong inputs and proceed further
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6|confirmed',
            'subdomain' => 'required|alpha_dash|unique:tenants,subdomain',
        ]);

        $subdomain = strtolower($request->subdomain); //user ne jo sab domain form mein diya hai wo yha milta 
        $databaseName = 'tenant_' . $subdomain; // ispe tenat ka suboamin name use kiya tenant prefix lga kr 

        // Step 2: Create user in main DB
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Step 3: Create tenant record
        Tenant::create([
            'subdomain' => $subdomain,
            'database'  => $databaseName,
        ]);//saving tenant sub domain and database 

        // Step 4: Create tenant database
        DB::statement("CREATE DATABASE `$databaseName`");

        // Step 5: Setup temporary tenant connection
        config(['database.connections.tenant' => [ //Tenant database connection banane ke liye

            'driver'    => 'mysql',
            'host'      => env('DB_HOST', '127.0.0.1'),
            'port'      => env('DB_PORT', '3307'),
            'database'  => $databaseName,
            'username'  => env('DB_USERNAME'),
            'password'  => env('DB_PASSWORD'),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
            'strict'    => true,
        ]]);

        // Step 6: Create required tables in tenant DB
        DB::connection('tenant')->statement("CREATE TABLE custom_fields (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            type VARCHAR(50),
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL
        )");//this will create a custom field table in database of tenant 

        DB::connection('tenant')->statement("CREATE TABLE dashboard_data (
            id INT AUTO_INCREMENT PRIMARY KEY,
            field_id INT,
            value TEXT,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL
        )"); //this will create tenant dahsboard data base

        // Step 7: Redirect with success
       return redirect()->route('company.details.form', ['user' => $user->id]);

    }
}
