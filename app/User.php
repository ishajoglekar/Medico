<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','age','gender','phone_no','role','doctor_id'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function otp()
    {
        return $this->hasOne(OTP::class);
    }

    public function getPassword(){
        return decrypt($this->password);
    }

    public function documents(){
        return $this->hasMany(Medicalrecords::class);
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class);
    }
    public function pharma()
    {
        return $this->hasOne(Pharma::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class)->withPivot('order_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count','order_id');
    }

    public function notificationSent()
    {
        return $this->hasMany(Notification::class,'from');
    }

    public function notificationReceived()
    {
        return $this->hasMany(Notification::class,'to');
    }

    public function isManufacturer()
    {
        if($this->role == "manufacturer"){
            return true;
        }
        return false;
    }
    public static function getAvatarAttribute($name,$size){
        // $size = 30;
        // dd($name);
        // $name = $name;
        // dd($name);
        return "https://ui-avatars.com/api/?name={$name}&rounded=true&size={$size}";
    }
    public function unreadNotification()
    {
        return count($this->notificationReceived()->where("read","0")->get());
    }
}
