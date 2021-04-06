<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $fillable = ['name','city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function establishments()
    {
        return $this->hasMany(Establishment::class);
    }
}
