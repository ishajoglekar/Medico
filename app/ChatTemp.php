<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatTemp extends Model
{
    protected $fillable = ['doctor_id','appointment_id'];
    protected $table = "chat_temp";
    public function doctor()
    {
        return $this->belongsTo(\App\Doctor::class);
    }
    public function appointment()
    {
        return $this->belongsTo(\App\Appointment::class);
    }
}
