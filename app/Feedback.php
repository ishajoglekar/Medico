<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = [];

    public function feedbacks()
    {
        return $this->belongsTo(Doctor::class);
    }
}


