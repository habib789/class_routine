<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class routine extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function class_time()
    {
        return $this->belongsTo(Class_time::class);
    }
}
