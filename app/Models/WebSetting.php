<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'company_address',
        'contact',
        'website',
        'email',
        'landphone',
        'logo',
        'favicon',
        'systemLogo',
    ];
}
