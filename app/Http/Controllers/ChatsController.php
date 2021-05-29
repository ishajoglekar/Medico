<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Events\OnlineEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatsController extends Controller
{
    public function setChat(Request $request)
    {
        $file_name = '';
        $user = User::find($request->receiver_id);
        // dd($request->receiver_id);
        $success = [];
        if ($request->user_id > $request->receiver_id)
            $file_name = 'chat_' . $request->receiver_id . '_' . $request->user_id . '.json';
        else
            $file_name = 'chat_' . $request->user_id . '_' . $request->receiver_id . '.json';
        $f_data = null;
        if (Storage::disk('local')->exists($file_name)) {

            $f_data = json_decode(Storage::disk('local')->get($file_name));
            $success[] = $f_data;
            $success[] = $user;

            // dd($success);
            return json_encode($success);
        } else {
            Storage::disk('local')->put($file_name, json_encode([]));
            $success[] = $f_data;
            $success[] = $user;
            return json_encode($success);
        }

        return null;
    }
    public function received(Request $request)
    {
        $file_name = '';
        if ($request->user_id > $request->receiver_id)
            $file_name = 'chat_' . $request->receiver_id . '_' . $request->user_id . '.json';
        else
            $file_name = 'chat_' . $request->user_id . '_' . $request->receiver_id . '.json';
        $f_data = null;
        if (Storage::disk('local')->exists($file_name)) {
            $f_data = json_decode(Storage::disk('local')->get($file_name));
        }
        if ($f_data) {
            $f_data[count($f_data) - 1]->read  = 'true';
        }
        Storage::disk('local')->put($file_name, json_encode($f_data));
        $this->sendReceived($request);
        // dd("hiii");
        return json_encode([]);
    }
    public function sendReceived(Request $request)
    {
        $arr = [];
        $arr[] = $request->receiver_id;
        $arr[] = $request->user_id;
        $arr[] = $request->msg;
        $arr[] = $request->ack;
        event(new OnlineEvent($arr));
    }
    public function chatUpdate(Request $request)
    {

        $file_name = '';
        if ($request->user_id > $request->receiver_id)
            $file_name = 'chat_' . $request->receiver_id . '_' . $request->user_id . '.json';
        else
            $file_name = 'chat_' . $request->user_id . '_' . $request->receiver_id . '.json';
        $f_data = null;
        if (Storage::disk('local')->exists($file_name)) {
            $f_data = json_decode(Storage::disk('local')->get($file_name));
        }
        if ($f_data && (!empty($request->arr))) {
            foreach ($request->arr as $i) {

                $f_data[$i]->read = 'true';
            }
            $this->sendReceived($request);
        }
        Storage::disk('local')->put($file_name, json_encode($f_data));
        return json_encode([]);
    }
    public function send(Request $request)
    {

        $file_name = '';

        if ($request->user_id > $request->receiver_id)
            $file_name = 'chat_' . $request->receiver_id . '_' . $request->user_id . '.json';
        else
            $file_name = 'chat_' . $request->user_id . '_' . $request->receiver_id . '.json';
        // dd($request->user_id);
        $id = auth()->user()->id;
        $arr = [];
        $arr[] = $request->receiver_id;
        $arr[] = $request->user_id;
        $arr[] = $request->msg;
        event(new OnlineEvent($arr));
        // dd($request);
        $f_data = null;
        if (Storage::disk('local')->exists($file_name)) {
            $f_data = json_decode(Storage::disk('local')->get($file_name));
        }
        $file_data = [];
        $file_data['id' . $id] = 'sent-message';
        $file_data['id' . $request->receiver_id] = 'recieved-message';
        $file_data['time'] = date("g:i a", strtotime(now()));
        $file_data['date'] = date("F j Y", strtotime(now()));
        $file_data['msg'] = $request->msg;
        $file_data['read'] = 'false';
        $final_data = [];
        if (Storage::disk('local')->exists($file_name)) {
            $f_data[count($f_data)] = $file_data;
            Storage::disk('local')->put($file_name, json_encode($f_data));
        } else {
            $final_data[] = $file_data;
            Storage::disk('local')->put($file_name, json_encode($final_data));
        }

        // $request->file($file_name)->store($);
        // file_put_contents(public_path('resources/lang/'.$file_name), stripslashes(json_encode($file_data)));
        return [
            'nkasldmsad' => true
        ];
    }
}
