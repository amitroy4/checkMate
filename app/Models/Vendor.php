<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_name',
        'vendor_designation',
        'company_name',
        'mobile_number',
        'whatsapp_number',
        'email',
        'status',
    ];

    public function chequePays()
    {
        return $this->hasMany(ChequePay::class,'payee_id');
    }
}
