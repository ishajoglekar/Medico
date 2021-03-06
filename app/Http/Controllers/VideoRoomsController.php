<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Events\VideoCall;
use Exception;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class VideoRoomsController extends Controller
{
    protected $sid;
    protected $token;
    protected $key;
    protected $secret;

    public function __construct()
    {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->key = config('services.twilio.key');
        $this->secret = config('services.twilio.secret');
    }
    public function index()
    {
        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read([]);

                $rooms = array_map(function($room) {
                return $room->uniqueName;
                }, $allRooms);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return view('video.index', ['rooms' => $rooms]);
    }
    public function createRoom(Request $request)
    {
        $client = new Client($this->sid, $this->token);
        $appointment = Appointment::find($request->appointment_id);
        $appointment->update(['status'=>'active']);
        $exists = $client->video->rooms->read([ 'uniqueName' => $request->roomName]);

        if (empty($exists)) {
            $client->video->rooms->create([
                'uniqueName' => $request->roomName,
                'type' => 'group',
                'recordParticipantsOnConnect' => false
            ]);

            \Log::debug("created new room: ".$request->roomName);
        }
        if($request->roomName){
            $arr = [];
            $arr[] = $request->user_id;
            $arr[] = $request->roomName;
            event(new VideoCall($arr));
        }
        return redirect()->action('VideoRoomsController@joinRoom', [
            'roomName' => $request->roomName
        ]);
    }
    public function join(Request $request){
        return redirect()->action('VideoRoomsController@joinRoom', [
            'roomName' => $request->room,
            'appointment_id'=>$request->appointment_id
        ]);
    }
    public function joinRoom($roomName,$appointment_id=0)
    {
        // A unique identifier for this user
        $identity = auth()->user()->name;

        \Log::debug("joined with identity: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);

        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($roomName);

        $token->addGrant($videoGrant);

        return view('video.room', [ 'accessToken' => $token->toJWT(), 'roomName' => $roomName ,'appointment_id'=> $appointment_id]);
    }
}
