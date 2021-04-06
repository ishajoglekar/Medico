<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification_type extends Model
{
    protected $guarded = [];
    protected $table = "notification_types";

    public function notifications()
    {
        return $this->hasMany(Notification::class,'type_id');
    }
}
