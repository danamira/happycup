<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
    use HasFactory;
    

    public function users() {
        return $this->belongsToMany(User::class)->wherePivot('returned',false);
    }
}
