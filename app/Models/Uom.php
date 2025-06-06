<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    /** @use HasFactory<\Database\Factories\UomFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'name'
    ];
}
