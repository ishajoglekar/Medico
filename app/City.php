<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    public function localities()
    {
        return $this->hasMany(Locality::class);
    }
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
