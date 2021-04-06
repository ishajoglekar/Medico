<?php




namespace App\Http\Controllers\User;
use App\Appointment;
use App\City;
use App\Slot;
use App\Type;
use Carbon\Carbon;
use App\Doctor;
use App\Events\NotificationEvent;
use App\Events\NotifyDoctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookAppointmentRequest;
use App\Http\Requests\BookOthersAppointmentRequest;
use App\Notification_type;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        // dd($doctors);
        return view('user.findDoctor.doctors',compact([
            'doctors'
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

    public function show(Doctor $doctor)
    {
        $section = "doctors";
        $degree = $doctor->degree()->where('id',$doctor->degree_id)->get('name');
        $speciality = $doctor->speciality()->where('id',$doctor->speciality_id)->get('name');
        $establishmentCity = City::where('id',$doctor->establishment_city_id)->first()->name;
        $slot_today = $doctor->slot_date()->whereRaw('date(date) = curdate()')->get();
        $appointments = Appointment::where('user_id',auth()->user()->id)->get();
        $clinicSlots = [];
        $videoSlots = [];
        $section = 'slots';
        if(!$slot_today->count() == 0){
            $allSlotsToday = $slot_today[0]->slots->where('start_time','>',now()->format("H:i:s"));
            foreach($allSlotsToday as $slots)
            {
                foreach($slots->types as $t){
                    $appointment = Appointment::where([['slot_id','=',$slots->id],['user_id','=',auth()->user()->id]])->get();
                    // dd($appointment);
                    if($appointment->count() == 1 && $appointment[0]->status == "pending"){

                        if($slots->slot_date->date == now()->format("Y-m-d")){
                            if($t->id ==3)
                            {
                                $clinicSlot = [];
                                $clinicSlot[] = $slots;
                                $clinicSlot[] = $appointment->count();
                                $clinicSlots[] = $clinicSlot;
                            }
                            else if($t->id ==1)
                            {
                                $videoSlot = [];
                                $videoSlot[] = $slots;
                                $videoSlot[] = $appointment->count();
                                $videoSlots[] = $videoSlot;
                            }

                        }else if($slots->slot_date->date > now()->format("Y-m-d")){
                            if($t->id ==3)
                            {
                                $clinicSlot = [];
                                $clinicSlot[] = $slots;
                                $clinicSlot[] = $appointment->count();
                                $clinicSlots[] = $clinicSlot;
                            }
                            else if($t->id ==1)
                            {
                                $videoSlot = [];
                                $videoSlot[] = $slots;
                                $videoSlot[] = $appointment->count();
                                $videoSlots[] = $videoSlot;
                            }
                        }
                    }else{
                        if($slots->slot_date->date == now()->format("Y-m-d")){
                            if($t->id ==3)
                            {
                                $clinicSlot = [];
                                $clinicSlot[] = $slots;
                                $clinicSlot[] = $slots->booked;
                                $clinicSlots[] = $clinicSlot;
                            }
                            else if($t->id ==1)
                            {
                                $videoSlot = [];
                                $videoSlot[] = $slots;
                                $videoSlot[] = $slots->booked;
                                $videoSlots[] = $videoSlot;
                            }

                        }else if($slots->slot_date->date > now()->format("Y-m-d")){
                            if($t->id ==3)
                            {
                                $clinicSlot = [];
                                $clinicSlot[] = $slots;
                                $clinicSlot[] = $slots->booked;
                                $clinicSlots[] = $clinicSlot;
                            }
                            else if($t->id ==1)
                            {
                                $videoSlot = [];
                                $videoSlot[] = $slots;
                                $videoSlot[] = $slots->booked;
                                $videoSlots[] = $videoSlot;
                            }
                        }

                    }
                }
            }
        }
        // dd($clinicSlots);
        return view('user.findDoctor.singleDoc',compact([
            'section','doctor','degree','speciality', 'establishmentCity',
            'clinicSlots','videoSlots'
        ]));
    }

    public function fetchNextDaySlots(Request $request){
        // dd($i);
        $doctor = Doctor::find($request->docID);
        $whereCond = "date(date) = curdate()+". $request->i;
        // dd($doctor->slot_date()->where('date',Carbon::now()->addDays(1)->format("Y-m-d"))->first());
        $slot_today = $doctor->slot_date()->where('date',Carbon::now()->addDays($request->i)->format("Y-m-d"))->get();
        $clinicSlots = [];
        $videoSlots = [];
        $appointments = Appointment::where('user_id',auth()->user()->id)->get();
        if(!$slot_today->count() == 0){
            $allSlotsToday = $slot_today[0]->slots->where('start_time','>',now()->format("H:i:s"));
            foreach($allSlotsToday as $slots)
            {
                foreach($slots->types as $t){
                    $appointment = Appointment::where([['slot_id','=',$slots->id],['user_id','=',auth()->user()->id]])->get();
                    // dd($appointment);
                    if($appointment->count() == 1 && $appointment[0]->status == "pending"){

                        if($slots->slot_date->date == now()->format("Y-m-d")){
                            if($t->id ==3)
                            {
                                $clinicSlot = [];
                                $clinicSlot[] = $slots;
                                $clinicSlot[] = $appointment->count();
                                $clinicSlots[] = $clinicSlot;
                            }
                            else if($t->id ==1)
                            {
                                $videoSlot = [];
                                $videoSlot[] = $slots;
                                $videoSlot[] = $appointment->count();
                                $videoSlots[] = $videoSlot;
                            }

                        }else if($slots->slot_date->date > now()->format("Y-m-d")){
                            if($t->id ==3)
                            {
                                $clinicSlot = [];
                                $clinicSlot[] = $slots;
                                $clinicSlot[] = $appointment->count();
                                $clinicSlots[] = $clinicSlot;
                            }
                            else if($t->id ==1)
                            {
                                $videoSlot = [];
                                $videoSlot[] = $slots;
                                $videoSlot[] = $appointment->count();
                                $videoSlots[] = $videoSlot;
                            }
                        }
                    }else{
                        if($slots->slot_date->date == now()->format("Y-m-d")){
                            if($t->id ==3)
                            {
                                $clinicSlot = [];
                                $clinicSlot[] = $slots;
                                $clinicSlot[] = $slots->booked;
                                $clinicSlots[] = $clinicSlot;
                            }
                            else if($t->id ==1)
                            {
                                $videoSlot = [];
                                $videoSlot[] = $slots;
                                $videoSlot[] = $slots->booked;
                                $videoSlots[] = $videoSlot;
                            }

                        }else if($slots->slot_date->date > now()->format("Y-m-d")){
                            if($t->id ==3)
                            {
                                $clinicSlot = [];
                                $clinicSlot[] = $slots;
                                $clinicSlot[] = $slots->booked;
                                $clinicSlots[] = $clinicSlot;
                            }
                            else if($t->id ==1)
                            {
                                $videoSlot = [];
                                $videoSlot[] = $slots;
                                $videoSlot[] = $slots->booked;
                                $videoSlots[] = $videoSlot;
                            }
                        }

                    }
                }
            }
        }
        // dd($clinicSlots);
        return(json_encode([$clinicSlots,$videoSlots]));
    }


    public function confirmAppointment(Doctor $doctor,Slot $slot,$type)
    {
        // dd($type);
        $degree = $doctor->degree()->where('id',$doctor->degree_id)->get('name');
        $speciality = $doctor->speciality()->where('id',$doctor->speciality_id)->get('name');
        // dd($establishment);
        return view('user.findDoctor.confirmAppointment',compact(['doctor','slot','degree','speciality','type']));
    }
    public function bookOthersAppointment(doctor $doctor,Slot $slot,BookOthersAppointmentRequest $request){
        $this->bookAppointment($doctor,$slot,$request);
        return redirect(route('doctors.show',$doctor->id));

    }

    public function bookPersonalAppointment(doctor $doctor,Slot $slot,BookAppointmentRequest $request){
        $this->bookAppointment($doctor,$slot,$request);
        return redirect(route('doctors.show',$doctor->id));

    }
    public function bookAppointment(doctor $doctor,Slot $slot,Request $request)
    {
        // dd($request);
        $data = [
            'doctor_id' => $doctor->id,
            'reason' => $request->reason,
            'type_id' => $request->type_id,
            'slot_id'=>$slot->id,
            'user_id'=>auth()->user()->id
        ];
        $appointment = Appointment::create($data);

        $type = Notification_type::where("name","appointment-made")->first();

        $notification = $type->notifications()->create([
            'from'=>auth()->id(),
            'to'=>$doctor->user->id,
            'read'=>"0",
        ]);

        $app = [];
        $app[] = $doctor->user->id;
        $app[] = $type;
        $app[] = " from ".auth()->user()->name;

        event(new NotificationEvent($app));
        return redirect(route('doctors.show',$doctor->id));

    }

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
    public function getDoctors(Request $request){
        $city_id = [];
        $spec_id = [];
        if($request->city){
            $cities = DB::select(DB::raw("select * from cities where name like '%".$request->city."%'"));
            foreach($cities as $city){
                $city_id = ['city_id','=',$city->id];
            }
            if(!empty($city_id)){
                $doctors = Doctor::where([$city_id]);
            }
        }
        if($request->spec){
            $specs = DB::select(DB::raw("select * from specialities where name like '%".$request->spec."%'"));
            foreach($specs as $spec){
                $spec_id = ['speciality_id','=',$spec->id];
            }
            if(!empty($spec_id)){
                $doctors = Doctor::where([$spec_id]);
            }
        }
        if(!empty($city_id) && !empty($spec_id)){
            $doctors = Doctor::where([$city_id,$spec_id]);
        }

        if(empty($city_id) && empty($spec_id)){
            if($request->sort == "HTL"){
                $doctors = Doctor::orderBy('fees','desc')->get();
            }
            else if($request->sort == "LTH"){
                $doctors = Doctor::orderBy('fees','asc')->get();
            }
            else if($request->sort == "exp"){
                $doctors = Doctor::orderBy('years_of_exp','desc')->get();
            }
            else{
                $doctors = Doctor::orderBy('fees','asc')->get();
            }
            $arr = [];
            $arrr = [];
            $i = 0;
            // dd($doctors);
            foreach($doctors as $doctor){
                $arr[0] = $doctor;
                $arr[1] = $doctor->city;
                $arr[2] = $doctor->speciality;
                $arrr[$i] = $arr;
                $i++;
            }
            return json_encode($arrr);
        }
        if($request->sort == "HTL"){
            $doctors = $doctors->orderBy('fees','desc')->get();
        }
        else if($request->sort == "LTH"){
            $doctors = $doctors->orderBy('fees','asc')->get();
        }
        else if($request->sort == "EXP"){
            $doctors = $doctors->orderBy('years_of_exp','asc')->get();
        }else{
            $doctors = $doctors->get();
        }

        $arr = [];
        $arrr = [];
        $i = 0;
        // dd($doctors);
        foreach($doctors as $doctor){
            $arr[0] = $doctor;
            $arr[1] = $doctor->city;
            $arr[2] = $doctor->speciality;
            $arrr[$i] = $arr;
            $i++;
        }
        return json_encode($arrr);
    }
    public function showPrescriptions(){
        $user = auth()->user();
        $appointments = $user->appointments;
        $prescriptionsArr1 = [];
        foreach($appointments as $appointment){
            foreach($appointment->slot()->get() as $slots){
                foreach($slots->slot_date()->get() as $slotDate){
                    // dd($slots);
                    $doctor = Doctor::where('id',$appointment->doctor_id)->first();
                    // dd($doctor->fullname);
                    $prescriptionArr = [];
                    $prescriptionArr[] = $doctor->fullname;
                    $prescriptionArr[] = $doctor->establishment_name;
                    $prescriptionArr[] = $slotDate->date;
                    $prescriptionArr[] = $slots->start_time;
                    $prescriptionArr[] = $slots->types()->where('type_id',$appointment->type_id)->first()->name;
                    // dd($appointment->report_pdf);
                    $prescriptionArr[] = $appointment->report_pdf;

                    // $prescriptionArr[] = $slot_date->slots()->where('booked','1')->count();
                    $prescriptionsArr1[] = $prescriptionArr;
                    // dd($prescriptionArr);
                }
            }
        }

        // dd($prescriptionsArr1);

        
        return view('user.dashboard.prescription.index', compact([
            'prescriptionsArr1'
        ]));
    }
    public function showOrders(){
        $user = auth()->user();

    }

}
