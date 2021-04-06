<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $guarded = [];


    public function slot_date()
    {
        return $this->belongsTo(SlotDate::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
