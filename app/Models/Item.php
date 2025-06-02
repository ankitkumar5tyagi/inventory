<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function suppliers() {
        return $this->belongsToMany(Supplier::class);
    }
}
