<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    // Jo columns aap mass assign karna chahte ho (create/update mein)
    protected $fillable = [
        'user_id',
        'company_name',
        'email',
        'phone',
        'website',
        'business_type',
        'business_size',
        'industry',
        'country',
        'state',
        'city',
        'address',
        'postal_code',
        'timezone',
        'currency',
        'language',
        'gstin',
    ];
}
