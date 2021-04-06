<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Notification;
use App\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find(auth()->id());
        $notification = $user->notificationReceived()->where("read","0")->get();
        foreach($notification as $notify){
            $notify->update([
                "read"=>1
            ]);
        }
    }
}
