<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequePay extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'cheque_date',
        'payee_id',
        'bank_id',
        'amount',
        'paytype',
        'cheque_number',
        'is_fly_cheque',
        'cheque_status',
        'cheque_clearing_date',
        'cheque_reason',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function payee()
    {
        return $this->belongsTo(Vendor::class, 'payee_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
