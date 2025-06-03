<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

   public function user() {
    return $this->belongsTo(User::class);
   }

   public function consumer() {
    return $this->belongsTo(Consumer::class);
   }
}
