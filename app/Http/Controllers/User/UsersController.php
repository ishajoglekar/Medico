<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Speciality;
use App\Appointment;
use App\OnlineDoctor;
use App\ChatTemp;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        
        return view('user.dashboard.profile',compact(['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function editUser(User $user){
        return view('user.dashboard.edit-profile',compact('user'));
    }
    public function updateUserdata(UpdateUserRequest $request){
        $user = User::find(auth()->user()->id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'gender'=>$request->gender,
            'age'=>$request->age,
            'phone_no'=>$request->phone_no
        ]);
        return redirect(route('user.dashboard.profile',$user));
    }
    public function getUser(Request $request){
        $user = User::findOrFail($request->user_id);
        return json_encode($user);
    }

    public function createChatAppointment(){
        $specialities = Speciality::all();
        $count = OnlineDoctor::all()->count();
        return view('user.findDoctor.chatAppointment',compact([
            'specialities','count'
        ]));
    }
    /*public function bookChatAppointment(Request $request){
        $appointment = Appointment::find($request->appointment_id);
        $alreadyAssigned = ChatTemp::where('appointment_id',$request->appointment_id)->get();
        $onlinedocs = [];
        if(count($alreadyAssigned) >= 2){
            dd("Busy"); //user side
        }
        if(!empty($alreadyAssigned)){
            $newArr = [] ;
            foreach($alreadyAssigned as $doc){
                $newArr[] = ['doctor_id','!=',$doc->doctor_id];
            }
            $onlinedocs = OnlineDoctor::where($newArr)->get();
        }
        else{
            $onlinedocs = OnlineDoctor::all();
        }
        $doctors=[];
        $randomDoctor = NULL;


        foreach($onlinedocs as $onlinedoc)
        {

            if($onlinedoc->doctor->speciality_id == $request->speciality_id){
                $doctors[] = $onlinedoc->doctor;
            }
            else if($onlinedoc->doctor->speciality_id == auth()->user()->doctor->speciality_id){
                $try = $onlinedoc->doctor;
                if($try != Null)
                $doctors[] = $try;
            }

        }
        if(count($doctors) > 0)
            $randomDoctor = $doctors[rand(0,count($doctors) - 1)];


        if(auth()->user()->doctor_id != NULL){

            $appointment->update(['doctor_id'=>$randomDoctor->id]);
            $appointment->save();
            $temp = ChatTemp::create([
                'doctor_id'=>$randomDoctor->id,
                'appointment_id'=>$request->appointment_id
            ]);
        }
        else{
            $appointment = Appointment::create([
                'type_id' => 2,
                'reason' => $request->reason,
                'user_id' => auth()->id(),
                'doctor_id' => $randomDoctor->id,
                'chat_duration' => now()->addDays(1)
            ]);
            $temp = ChatTemp::create([
                'doctor_id'=>$randomDoctor->id,
                'appointment_id'=>$appointment->id
            ]);
        }


        return view('home.index');



    }*/

    public function bookChatAppointment(Request $request){

        $onlinedocs = OnlineDoctor::all();
        $doctors=[];
        $randomDoctor = NULL;


        foreach($onlinedocs as $onlinedoc)
        {

            if($onlinedoc->doctor->speciality_id == $request->speciality_id){
                $doctors[] = $onlinedoc->doctor;
            }
        }
        if(count($doctors) > 0)
            $randomDoctor = $doctors[rand(0,count($doctors) - 1)];


        $appointment = Appointment::create([
            'type_id' => 2,
            'reason' => $request->reason,
            'user_id' => auth()->id(),
            'doctor_id' => $randomDoctor->id,
            'chat_duration' => now()->addDays(1)
        ]);
        $temp = ChatTemp::create([
            'doctor_id'=>$randomDoctor->id,
            'appointment_id'=>$appointment->id
        ]);
        return json_encode($appointment);

    }

    public function checkChatBookedAppointment(Request $request){
        $appointment = Appointment::find($request->appointment_id);
        if($appointment->status == "accept"){
            return json_encode(["status"=>"accept"]);
        }
        else if($appointment->status == "reject"){
            $mainCount = $request->mainCount + 1;
            if($mainCount <= 3){
                if($this->bookAnotherDoctorAppointment($appointment)){
                    return json_encode(["status"=>"pending","count"=>0]);
                }
                else{
                    $appointment->temp()->delete();
                    $appointment->delete();
                    return json_encode(["status"=>"unavailable"]);
                }
            }
            return json_encode(["status"=>"reject","mainCount"=>$mainCount]);
        }
        else if($request->count > 10){
            $mainCount = $request->mainCount + 1;
            if($mainCount <= 2){
                if($this->bookAnotherDoctorAppointment($appointment)){
                    return json_encode(["status"=>"pending","count"=>0]);
                }
                else{
                    $appointment->temp()->delete();
                    $appointment->delete();
                    return json_encode(["status"=>"unavailable"]);
                }
            }
            return json_encode(["status"=>"timedout","mainCount"=>$mainCount]);
        }
    }
    public function bookAnotherDoctorAppointment($appointment){
        $alreadyAssigned = ChatTemp::where('appointment_id',$appointment->id)->get();
        $onlinedocs = [];

        if(!empty($alreadyAssigned)){
            $newArr = [] ;
            foreach($alreadyAssigned as $doc){
                $newArr[] = ['doctor_id','!=',$doc->doctor_id];
            }
            $onlinedocs = OnlineDoctor::where($newArr)->get();
        }

        $doctors=[];
        $randomDoctor = NULL;

        foreach($onlinedocs as $onlinedoc)
        {

            if($onlinedoc->doctor->speciality_id == $appointment->doctor->speciality_id){
                $try = $onlinedoc->doctor;
                if($try != Null)
                $doctors[] = $try;
            }

        }
        if(count($doctors) > 0)
        {
            $randomDoctor = $doctors[rand(0,count($doctors) - 1)];

            // dd($randomDoctor);

            $appointment->update(['doctor_id'=>$randomDoctor->id,'status'=>"pending"]);
            $appointment->save();

            $temp = ChatTemp::create([
                'doctor_id'=>$randomDoctor->id,
                'appointment_id'=>$appointment->id
            ]);
            return true;
        }
        else{
            return false;
        }
    }
    public function getCurrentLocation(Request $request){
        // $ip = \Request::ip();
        $ip = '43.231.238.110';
        $data = \Location::get($ip);
        return json_encode($data->cityName);
    }
}
