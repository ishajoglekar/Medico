<?php

namespace App\Http\Controllers\Doctor;

use App\City;
use App\College;
use App\Degree;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\OnlineDoctor;
use App\Regcouncil;
use App\Speciality;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $specialities = Speciality::all();


        // dd(auth()->check());
        $section = "profile";
        $doctor= $this->getDoctor();
        return view('doctor.dashboard.basic-details',compact([
            'cities',
            'specialities',
            'doctor',
            'section'

        ]));
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
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        dd($doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    public function setBasicDetails(Request $request)
    {
        session()->put('email',$request->email);
        session()->put('password',$request->password);
        session()->put('fees',$request->fees);
        session()->put('country_code',$request->country_code);
        session()->put('slot_duration',$request->slot_duration);
        session()->put('description',$request->description);
        session()->put('address',$request->address);
        session()->put('gender',$request->gender);
        session()->put('city_id',$request->city_id);
        session()->put('speciality_id',$request->speciality_id);
        //session()->put('image',$request->file('image'));
        $doctor= $this->getDoctor();
        if($request->file('image'))
         {
             $image=$request->file('image')->store('doctors');
             session()->put('image_name',$image);
         }
        $regcouncils = Regcouncil::all();
        $section = "profile";
        return view('doctor.dashboard.medical-details',compact([
            'regcouncils',
            'doctor',
            'section'

        ]));

    }

    public function setEducation(Request $request)
    {
        session()->put('reg_no',$request->reg_no);
        session()->put('regcouncil_id',$request->regcouncil_id);
        $degrees = Degree::all();
        $colleges = College::all();
        $doctor= $this->getDoctor();
        $section = "profile";
        return view('doctor.dashboard.education',compact([
            'degrees',
            'colleges',
            'doctor',
            'section'
        ]));
    }

    public function setEstablishment(Request $request)
    {
        session()->put('degree_id',$request->degree_id);
        session()->put('college_id',$request->college_id);
        session()->put('years_of_exp',$request->years_of_exp);
        $cities = City::all();
        $doctor= $this->getDoctor();
        $section = "profile";
        return view('doctor.dashboard.establishment',compact([
            'cities',
            'doctor',
            'section'
        ]));
    }

    public function getDoctor(){
        $doctor=null;
        if(auth()){
            if(auth()->user()->doctor_id != NULL)
            $doctor = Doctor::where('id',auth()->user()->doctor_id)->first();
        }
        return $doctor;
    }

    public function createDoctor(Request $request){
        session()->put('establishment_name',$request->establishment_name);
        session()->put('establishment_city_id',$request->establishment_city_id);
        $user = User::where('id',auth()->id())->first();
        if(auth()->user()->doctor_id != NULL)
        {
            $doctor = Doctor::where('id',auth()->user()->doctor_id)->first();
            $doctor->update([
                'establishment_name'=>  $request->establishment_name,
                'establishment_city_id'=> $request->establishment_city_id,
                'establishment_address'=>$request->establishment_address,
                'establishment_pincode'=>$request->establishment_pincode,
                'country_code'=> session()->get('country_code'),
                'description'=> session()->get('description'),
                'fees'=> session()->get('fees'),
                'email'=> session()->get('email'),
                'password'=> Hash::make(session()->get('password')),
                'city_id'=> session()->get('city_id'),
                'address'=> session()->get('address'),
                'years_of_exp'=> session()->get('years_of_exp'),
                'speciality_id'=> session()->get('speciality_id'),
                'gender'=> session()->get('gender'),
                'slot_duration'=> session()->get('slot_duration'),
                'reg_no'=> session()->get('reg_no'),
                'regcouncil_id'=> session()->get('regcouncil_id'),
                'degree_id'=> session()->get('degree_id'),
                'college_id'=> session()->get('college_id'),
                'image'=> session()->get('image_name')
            ]);
            $doctor->save();
        }
        else{
            $doctor = Doctor::create([
                'fullname'=> session()->get('name'),
                'establishment_name'=>  $request->establishment_name,
                'establishment_city_id'=> $request->establishment_city_id,
                'establishment_pincode'=>$request->establishment_pincode,
                'establishment_address'=>$request->establishment_address,
                'phone_no'=> session()->get('phone'),
                'country_code'=> session()->get('country_code'),
                'description'=> session()->get('description'),
                'fees'=> session()->get('fees'),
                'email'=> session()->get('email'),
                'password'=> Hash::make(session()->get('password')),
                'city_id'=> session()->get('city_id'),
                'address'=> session()->get('address'),
                'years_of_exp'=> session()->get('years_of_exp'),
                'speciality_id'=> session()->get('speciality_id'),
                'gender'=> session()->get('gender'),
                'slot_duration'=> session()->get('slot_duration'),
                'reg_no'=> session()->get('reg_no'),
                'regcouncil_id'=> session()->get('regcouncil_id'),
                'degree_id'=> session()->get('degree_id'),
                'college_id'=> session()->get('college_id'),
                'image'=> session()->get('image_name')
            ]);

        }
        $user->update(['doctor_id'=>$doctor->id,'email'=>$doctor->email,'password'=>$doctor->password,'gender'=>$doctor->gender]);
        $user->save();
        if(auth()->user()->doctor_id != NULL){
            $log = OnlineDoctor::all()->where('doctor_id',auth()->user()->doctor_id);
            if(empty($log[0]) && auth()->user()->doctor_id){
                $log = new OnlineDoctor();
                $log->createNewEntry();
            }
        }
        session()->forget('name');
        session()->forget('phone');
        session()->forget('fees');
        session()->forget('slot_duration');
        session()->forget('establishment_name');
        session()->forget('establishment_city_id');
        session()->forget('college_id');
        session()->forget('degree_id');
        session()->forget('reg_no');
        session()->forget('regcouncil_id');
        session()->forget('address');
        session()->forget('description');
        session()->forget('years_of_exp');
        session()->forget('image_name');
        session()->forget('gender');
        session()->forget('country_code');
        session()->forget('email');
        session()->forget('password');
        session()->forget('speciality_id');
        session()->forget('city_id');
        return redirect()->route('doctor.dashboard');
    }

    public function editSlot($slot_date)
    {
        dd("hello");
        return view('home.index');
    }
}
