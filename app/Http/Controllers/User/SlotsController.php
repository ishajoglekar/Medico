<?php

namespace App\Http\Controllers\User;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Slot;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::find(auth()->user()->id);
        $appointments = $user->appointments()->get();
        // dd($appointments);
        // $slots = $slot[0]->slot()->get();
        // $slotDate = $slots[0]->slot_date()->get();
        // $slotTime = $slots[0]->types()->get();
        $slotsArr = [];
        // dd($slotTime);
        foreach($appointments as $appointment){
            foreach($appointment->slot()->get() as $slots){
                foreach($slots->slot_date()->get() as $slotDate){
                    // dd($slots);

                    $doctor = Doctor::where('id',$appointment->doctor_id)->first();
                    // dd($doctor->fullname);

                    // dd($time);
                    // if($doctor->slot_duration)
                    $slotArr = [];
                    $slotArr[] = $doctor->fullname;
                    $slotArr[] = $doctor->fees;
                    $slotArr[] = $doctor->address;
                    $slotArr[] = $slotDate->date;
                    $slotArr[] = $slots->start_time;
                    $slotArr[] = $slots->types()->where('type_id',$appointment->type_id)->first()->name;
                    $slotArr[] = $appointment->status;
                    $slotArr[] = $doctor->id;
                    $slotArr[] = $appointment->id;


                    // $slotArr[] = $slot_date->slots()->where('booked','1')->count();
                    $slotsArr[] = $slotArr;
                }

            }
            // dd($slotsArr[0][4]);
        }

        return view('user.dashboard.slots.index',compact(['slotsArr']));
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
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slot $slot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        //
    }
}
