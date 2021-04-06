<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharma extends Model
{
    protected $guarded = [];
    protected $table = "pharma";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
