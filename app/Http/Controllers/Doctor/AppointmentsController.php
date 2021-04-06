<?php

namespace App\Http\Controllers\Doctor;

use App\Appointment;
use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Notification_type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = [];
        $doctor = auth()->user()->doctor;
        if(auth()->user()->doctor_id != NULL){
            $section = "appointment";
            $appointment = $doctor->appointments()->where([['type_id','!=',2],['status','=','pending']])->get();
            // dd($doctor->appointments());
            foreach($appointment as $item)
            {
               if($item->slot->slot_date->date>=now()->format('Y-m-d'))
               {
                   if($item->slot->slot_date->date==now()->format('Y-m-d') && $item->slot->start_time>now()->format('H:i:s'))
                   {
                        $appointments[] = $item;
                   }else if($item->slot->slot_date->date>now()->format('Y-m-d')){
                        $appointments[] = $item;
                    }
                   else{
                        $item->update([
                            'status'=>'Time Over'
                        ]);
                   }
               }
               else{
                    $item->update([
                        'status'=>'Time Over'
                    ]);
                }

            }
            return view('doctor.appointments.index',compact(['appointments','section']));
        }
        else{
            return redirect()->route('doctor.dashboard');
        }
    }
    public function getNewAppointments(){
        $doctor = auth()->user()->doctor;
        $appointments = $doctor->appointments()->where([['type_id','!=',2],['status','=','pending']])->orderBy('created_at','desc')->get();

        $final_appointments = [];
        foreach ($appointments as $appointment) {
            if($appointment->slot->slot_date->date>=now()->format('Y-m-d'))
               {
                   if($appointment->slot->slot_date->date==now()->format('Y-m-d') && $appointment->slot->start_time>now()->format('H:i:s'))
                   {
                        $arr = [];
                        $arr[] = $appointment;
                        $arr[] = $appointment->user;
                        $arr[] = $appointment->slot;
                        $arr[] = $appointment->slot->slot_date;
                        $arr[] = $appointment->type;
                        $final_appointments[] = $arr;
                   }
                   else if($appointment->slot->slot_date->date>now()->format('Y-m-d')){
                        $arr = [];
                        $arr[] = $appointment;
                        $arr[] = $appointment->user;
                        $arr[] = $appointment->slot;
                        $arr[] = $appointment->slot->slot_date;
                        $arr[] = $appointment->type;
                        $final_appointments[] = $arr;
                    }else{
                        $appointment->update([
                            'status'=>'Time Over'
                        ]);
                    }
               }else{
                    $appointment->update([
                        'status'=>'Time Over'
                    ]);
                }


        }
        return json_encode($final_appointments);
    }
    public function getPreviousAppointments(){
        $doctor = auth()->user()->doctor;
        $appointments = $doctor->appointments()->where([['type_id','!=',2],['status','!=','pending']])->orderBy('created_at','desc')->get();;
        $time =auth()->user()->doctor->slot_duration;
        $final_appointments = [];

        foreach ($appointments as $appointment) {
            $endTime = Carbon::parse($appointment->slot->start_time)->addMinutes($time)->format('H:i:s');

            $arr = [];
            $arr[] = $appointment;
            $arr[] = $appointment->user;
            $arr[] = $appointment->slot;
            $arr[] = $appointment->slot->slot_date;
            $arr[] = $appointment->type;
            // $arr[] = ($appointment->slot->start_time <= Carbon::now()->format('H:i:s') ? ($endTime>= Carbon::now()->format('H:i:s') ? true false) :false );
            $arr[] = $appointment->slot->start_time <= Carbon::now()->format('H:i:s')? ($endTime>= Carbon::now()->format('H:i:s')) : false;
            $arr[] = $appointment->doctor->slot_duration;
            $final_appointments[] = $arr;
        }
        // dd($final_appointments[1][5]);
        return json_encode($final_appointments);
    }
    public function getChatsAppointments(){
        $doctor = auth()->user()->doctor;
        $appointments = $doctor->appointments()->where([['type_id','=',2],['status','=','pending']])->get();
        $final_appointments = [];
        foreach ($appointments as $appointment) {
            $arr = [];
            $arr[] = $appointment;
            $arr[] = $appointment->user;
            $final_appointments[] = $arr;
        }
        return json_encode($final_appointments);
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
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
    public function accept(Request $request,Appointment $appointment){

        $appointment->update([
            'status'=>'accept'
        ]);
        $chat = false;
        if($appointment->type->name == 'chat')
            $chat = true;
        if($appointment->slot){
            $appointment->slot->update([
                'booked'=>1
            ]);
            $type = Notification_type::where("name","appointment-accepted")->first();

            $notification = $type->notifications()->create([
                'from'=>auth()->id(),
                'to'=>$appointment->user->id,
                'read'=>"0",
            ]);


            $app = [];
            $app[] = $appointment->user->id;
            $app[] = $type;
            $app[] = " by ".$appointment->doctor->fullname;
            event(new NotificationEvent($app));
        }

        if($chat)
        {
            return redirect(route('receive'));
        }
        else
        {
            return redirect(route('appointments.index'));
        }


    }
    public function reject(Request $request,Appointment $appointment){

        $appointment->update([
            'status'=>'reject'
        ]);

        $type = Notification_type::where("name","appointment-rejected")->first();
        $notification = $type->notifications()->create([
            'from'=>auth()->id(),
            'to'=>$appointment->user->id,
            'read'=>"0",
        ]);

        $app = [];
        $app[] = $appointment->user->id;
        $app[] = $type;
        $app[] = " by ".$appointment->doctor->fullname;
        event(new NotificationEvent($app));

        return redirect(route('appointments.index'));
    }
}
