<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Class_time extends Model
{
    protected $guarded=[''];

    public function routines()
    {
        return $this->hasMany(routine::class);
    }
}
