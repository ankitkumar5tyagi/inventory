<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    protected $fillable = [
            'code',
            'name',
            'uom_id',
            'description',
            'group_id',
            'category_id',
            'opening',
            'opening_price',
            'reorder_level',
            'godown_id',
            'location',
            'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function uom() {
        return $this->belongsTo(UOM::class);
    }
    public function group() {
        return $this->belongsTo(Group::class);
    }
    public function godown() {
        return $this->belongsTo(Godown::class);
    }
}
