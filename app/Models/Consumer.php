<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    /** @use HasFactory<\Database\Factories\ConsumerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'location',
        'contact_person',
        'phone',
        'status'
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
