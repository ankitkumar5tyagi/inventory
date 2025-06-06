<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

     protected $fillable = [
        'name',
        'code',
        'description',
        'status'
    ];

    public function item () {
        return $this->hasMany(Item::class);
    }
}
