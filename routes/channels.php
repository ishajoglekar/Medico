<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('notify-doctor.{id}', function ($user, $id) {
    return true;
    // return (int) $user->id === (int) $id;
});
Broadcast::channel('online.{receiver_id}.{id}', function ($user,$receiver_id,$id) {
    return true;
    // return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('chat', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});
Broadcast::channel('call.{id}', function ($user, $id) {
    return true;
});


Broadcast::channel('notify.{id}', function ($user, $id) {
    return true;
});
