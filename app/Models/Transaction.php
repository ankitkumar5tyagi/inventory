<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'voucher_entry_id',
        'item_id',
        'quantity',
        'uom',
        'rate',
    ];

   public function item() {
    return $this->belongsTo(Item::class);
   }
   public function voucherEntry() {
    return $this->belongsTo(VoucherEntry::class);
   }
}
