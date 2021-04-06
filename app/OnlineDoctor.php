<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineDoctor extends Model
{
    protected $fillable = ['doctor_id'];
    protected $table = "doctor_online";
    public function createNewEntry(){
        $log = new OnlineDoctor();
        $log->doctor_id = auth()->user()->doctor_id;
        $log->save(); 
    }
    public function updateEntry(){
        $log = Log::all()->where('session_id',session()->getId())->first();
        $log->logged_out = \Carbon\Carbon::now();
        $log->save(); 
    }
    public function doctor()
    {
        return $this->belongsTo(\App\Doctor::class);
    }
}
