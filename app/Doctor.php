<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['fullname','description','image','fees','phone_no','password','email','city_id','speciality_id','gender','reg_no','slot_duration','regcouncil_id','degree_id','college_id','establishment_name','establishment_address','establishment_pincode','establishment_city_id','country_code','years_of_exp','address'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function slot_date()
    {
        return $this->hasMany(SlotDate::class);
    }

    public function college()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function regCouncil()
    {
        return $this->belongsTo(Regcouncil::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function type()
    {
        return $this->belongsToMany(Type::class)->withTimestamps();
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function online()
    {
        return $this->hasOne(OnlineDoctor::class);
    }
    public function temp()
    {
        return $this->hasOne(ChatTemp::class);
    }
}
