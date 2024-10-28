<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'company_address',
        'district',
        'zipcode',
        'contact_number',
        'whatsapp_number',
        'land_line_number',
        'email',
        'company_website',
        'company_facebook_url',
        'company_logo',
        'registration_number',
        'status',
    ];
}
