<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'date',
        'type',
        'consumer_id',
        'supplier_id',
        'item_id',
        'uom',
        'quantity',
        'bill_order_no',
        'note'
    ];

   public function user() {
    return $this->belongsTo(User::class);
   }

   public function consumer() {
    return $this->belongsTo(Consumer::class);
   }
   public function party() {
    return $this->belongsTo(Party::class);
   }
   public function item() {
    return $this->belongsTo(Item::class);
   }
}
