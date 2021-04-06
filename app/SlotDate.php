<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotDate extends Model
{
    protected $fillable = ['doctor_id','date'];
    protected $table = "slot_date";
    public function appointments()
    {
        return $this->hasOne(Appointment::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


    public function slots()
    {
        return $this->hasMany(Slot::class);
    }
}
