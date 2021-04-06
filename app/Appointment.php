<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // protected $fillable= ['reason','type_id','report_pdf','doctor_id','user_id','slot_id'];
    protected $guarded = [];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function temp()
    {
        return $this->hasOne(ChatTemp::class);
    }


}

