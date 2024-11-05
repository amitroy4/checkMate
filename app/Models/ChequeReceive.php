<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeReceive extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'cheque_date',
        'client_id',
        'bank_id',
        'amount',
        'receivetype',
        'cheque_receiver_name',
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

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
