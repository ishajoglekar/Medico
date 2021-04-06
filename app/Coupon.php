<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('order_id');
    }
    
}
