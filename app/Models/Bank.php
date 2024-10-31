<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_name',
        'branch_name',
        'address',
    ];
    public function chequePays()
    {
        return $this->hasMany(ChequePay::class);
    }
}
