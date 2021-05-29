<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Doctor;
use App\Http\Requests\Doctor\Slot\CreateSlotRequest;
use App\Slot;
use App\Type;
use App\SlotDate;
use Illuminate\Support\Str;

class SlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::find(auth()->user()->doctor_id);
       if(auth()->user()->doctor_id != NULL){
           $section = "slot";
            $slots_date = $doctor->slot_date()->where('date','>=',now()->format('Y-m-d'))->get();
            $slotsArr = [];
            foreach($slots_date as $slot_date){
                $slotArr = [];
                $slotArr[] = $slot_date;
                $slotArr[] = $slot_date->slots->count();
                $slotArr[] = $slot_date->slots()->where('booked','1')->count();
                $slotsArr[] = $slotArr;
            }

            return view('doctor.slots.index',compact([
                'slotsArr',
                'section',
            ]));
        }
        else{
            return redirect()->route('doctor.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = "slot";
        $doctor = Doctor::find(auth()->user()->doctor_id);
        $section = 'slots';
        $slots_date = $doctor->slot_date;
        return view('doctor.slots.create',compact(['slots_date','section']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlotRequest $request)
    {
        // dd($request);
        $doctor = Doctor::findOrFail(auth()->user()->doctor_id);
        $section = 'slots';
        if($doctor){
            $slot_date = $doctor->slot_date()->create([
                'date'=>$request->slot_date
            ]);
            foreach($request->time as $time){
                $oldTime = $time;
                $slot = $slot_date->slots()->create([
                    'start_time'=>$time
                ]);
                foreach($request->type as $typeName){
                    // dd($time);
                    if(Str::contains($typeName, $oldTime)){
                        // dd(Type::where('name',explode('-',$typeName)[0])->first());
                        $type = Type::where('name',explode('-',$typeName)[0])->first();
                        $type->slots()->attach($slot->id);
                    }
                }
            }

            return redirect(route('slots.index'));
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {

    }

    public function edit($slot_date)
    {
        $section = "slot";
        $slot_date = SlotDate::find($slot_date);
        $section = 'slots';
        $slots = $slot_date->slots;
        $section = "slot";
        $typeArr = [];
        foreach($slot_date->slots as $slot){

            $types = $slot->types;
            $typeArr[$slot->id.'clinic'] = '';
            $typeArr[$slot->id.'video'] = '';
            foreach($types as $type){
                if($type->name=='clinic')
                    $typeArr[$slot->id.'clinic'] = 'checked';
                else if($type->name=='video')
                    $typeArr[$slot->id.'video'] = 'checked';
            }
        }

        $typeArr = json_encode($typeArr);
        return view('doctor.slots.edit',compact(['slot_date','slots','typeArr','section']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slot_date)
    {
        $slot_date = SlotDate::find($slot_date);
        $section = 'slots';
        if($request->old){
        foreach($request->old as $old){
            if(explode('-',$old)[1]>0)
            {
                $slot = Slot::find(explode('-',$old)[1]);
                foreach($slot->types as $type){
                    $type->slots()->detach($slot->id);
                }
                $slot->update([
                    'start_time'=>explode('-',$old)[0]
                ]);
                foreach($request->type as $typeName){
                    // dd($time);
                    if(Str::contains($typeName, $slot->start_time)){
                        // dd(Type::where('name',explode('-',$typeName)[0])->first());
                        $type = Type::where('name',explode('-',$typeName)[0])->first();
                        $type->slots()->attach($slot->id);
                    }
                }
            }else{
                $oldTime = explode('-',$old)[0];
                $slot = $slot_date->slots()->create([
                    'start_time'=>$oldTime
                ]);
                foreach($request->type as $typeName){
                    // dd($time);
                    if(Str::contains($typeName, $oldTime)){
                        // dd(Type::where('name',explode('-',$typeName)[0])->first());
                        $type = Type::where('name',explode('-',$typeName)[0])->first();
                        $type->slots()->attach($slot->id);
                    }
                }
            }
        }
    }
        return redirect(route('slots.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slot = Slot::find($request->slot_id);
        $section = 'slots';
        foreach($slot->types as $type){
            $type->slots()->detach($slot->id);
        }
        $slot->delete();
        return json_encode(['id'=>$request->id,'delete'=>1]);
    }
}
