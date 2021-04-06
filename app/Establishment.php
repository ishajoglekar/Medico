<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = ['name','address','locality_id'];

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }
}
