<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherEntry extends Model
{
    /** @use HasFactory<\Database\Factories\VoucherEntryFactory> */
    use HasFactory;

    protected $fillable = [
        'voucher_id',
        'date',
        'voucher_no',
        'party_id',
        'note'
    ];

    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }

    public function party() {
        return $this->belongsTo(Party::class);
    }
    public function transaction() {
        return $this->hasMany(Transaction::class);
    }


}


