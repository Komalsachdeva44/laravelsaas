<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Models\User;

class CompanyDetailController extends Controller
{
    public function showForm($userId)
    {
        $user = User::findOrFail($userId);
        return view('company_details', compact('user'));
    }

    public function store(Request $request, $userId)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email'        => 'required|email',
            'phone'        => 'required|string|max:20',
            'website'      => 'nullable|url',
            'business_type' => 'required|string',
            'business_size' => 'required|string',
            'industry'      => 'nullable|string',
            'country'       => 'required|string',
            'state'         => 'required|string',
            'city'          => 'required|string',
            'address'       => 'required|string',
            'postal_code'   => 'nullable|string',
            'timezone'      => 'required|string',
            'currency'      => 'required|string',
            'language'      => 'required|string',
            'gstin'         => 'nullable|string',
        ]);

        CompanyDetail::create([
            'user_id'    => $userId,
            'company_name' => $request->company_name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'website'      => $request->website,
            'business_type' => $request->business_type,
            'business_size' => $request->business_size,
            'industry'      => $request->industry,
            'country'       => $request->country,
            'state'         => $request->state,
            'city'          => $request->city,
            'address'       => $request->address,
            'postal_code'   => $request->postal_code,
            'timezone'      => $request->timezone,
            'currency'      => $request->currency,
            'language'      => $request->language,
            'gstin'         => $request->gstin,
        ]);

        return redirect('/dashboard')->with('success', 'Company setup complete!');

    }
}
