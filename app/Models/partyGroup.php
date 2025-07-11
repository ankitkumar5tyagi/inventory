<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partyGroup extends Model
{
    /** @use HasFactory<\Database\Factories\PartyGroupFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    public function party(){
        return $this->hasMany(Party::class);
    }
}
