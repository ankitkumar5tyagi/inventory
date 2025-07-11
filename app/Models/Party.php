<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;

    protected $fillable = [
        'partyGroup_id',
        'name',
        'email',
        'phone',
        'address',
        'company',
        'pan',
        'gst',
        'status'
    ];

    public function voucherEntry(){
        return $this->hasMany(VoucherEntry::class);
    }

    public function partyGroup() {
        return $this->belongsTo(PartyGroup::class);
    }
}
