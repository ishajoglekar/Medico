<?php

namespace App\Http\Controllers\Auth;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manufacturer\CreateUserManufacturerRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Manufacturer;
use App\OTP;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Notification_type;
use App\OnlineDoctor;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mime\Header\Headers;
use Twilio\Rest\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'phone_no' => $data['phone_no'],
            'role' => $data['role'],
            'email' => "raj@gmail.com",
            'password' => Hash::make("abcd1234")
        ]);


        return $user;
    }

    public function generateMessage(CreateUserManufacturerRequest $request){
        $randomNumber = rand(100000,999999);

        $otps = OTP::where('phone',$request->phone_no)->get();
        if(!empty($otps)){
            foreach($otps as $otp)
                $otp->delete();
        }
        // dd(date('Y-m-d H:i:s', (Carbon::now()->timestamp+300)));
        $otp = OTP::create([
            'otp'=> $randomNumber,
            'validity'=>date('Y-m-d H:i:s', (Carbon::now()->timestamp+300)),
            'phone'=>$request->phone_no
        ]);
        session()->put('name',$request->name);
        session()->put('phone',$otp->phone);
        session()->put('email',$request->email);
        session()->put('gender',$request->gender);
        session()->put('age',$request->age);
        session()->put('company_name',$request->company_name);
        // session()->put('role',$request->role);
        $this->sendMessage($otp->phone,$randomNumber);
        return redirect()->back();
    }

    public function generateMessageForUser(CreateUserRequest $request){
        $randomNumber = rand(100000,999999);
        $otps = OTP::where('phone',$request->phone)->get();
        if(!empty($otps)){
            foreach($otps as $otp)
                $otp->delete();
        }
        // dd(date('Y-m-d H:i:s', (Carbon::now()->timestamp+300)));
        $otp = OTP::create([
            'otp'=> $randomNumber,
            'validity'=>date('Y-m-d H:i:s', (Carbon::now()->timestamp+300)),
            'phone'=>$request->phone
        ]);
        session()->put('name',$request->name);
        session()->put('phone',$otp->phone);

        // session()->put('role',$request->role);
        $this->sendMessage($otp->phone,$randomNumber);
        return redirect()->back();
    }

    // public function generateMessage(Request $request){

    //     $randomNumber = rand(100000,999999);
    //     $phone  = session('phone') ? session('phone') : $request->phone;
    //     $otps = OTP::where('phone',$phone)->get();
    //     if(!empty($otps)){
    //         foreach($otps as $otp)
    //             $otp->delete();
    //     }
    //     // dd(date('Y-m-d H:i:s', (Carbon::now()->timestamp+300)));
    //     $otp = OTP::create([
    //         'otp'=> $randomNumber,
    //         'validity'=>date('Y-m-d H:i:s', (Carbon::now()->timestamp+300)),
    //         'phone'=>$phone
    //     ]);


    //     session('phone') ? '' : session()->put('phone',$otp->phone);
    //     $this->sendMessage($otp->phone,$randomNumber);
    //     return redirect()->back();
    // }


    public function resendOTP(Request $request){

        $randomNumber = rand(100000,999999);

        if(!session('phone')){
            session()->put('resenderror','Enter your Number First!');
            return redirect()->back();
        }
        $otps = OTP::where('phone',session('phone'))->get();
        if(!empty($otps)){
            foreach($otps as $otp)
                $otp->delete();
        }
        // dd(date('Y-m-d H:i:s', (Carbon::now()->timestamp+300)));
        $otp = OTP::create([
            'otp'=> $randomNumber,
            'validity'=>date('Y-m-d H:i:s', (Carbon::now()->timestamp+300)),
            'phone'=>session('phone')
        ]);

        $this->sendMessage($otp->phone,$randomNumber);
        return redirect()->back();
    }

    public function sendMessage($phone,$otp)
    {
        $account_sid = getenv('TWILIO_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_NUMBER');

        
        // $account_sid = 'AC2dd375893cd717da4f26f6e4c91f82d2';
        // $auth_token = 'd6340fa0e18768e30447f76adb4ef1a9';
        // $twilio_number = '+15743183454';

  
        $client = new Client($account_sid, $auth_token);
        $client->messages->create('+91'.$phone,
                ['from' => $twilio_number, 'body' => 'Registered! Your OTP is: '.$otp] );
    }

    public function verifyotp(Request $request){
        if(session()->get('role') == NULL){
            session()->put('role','doctor');
        }
        $otp = OTP::where('phone',session()->get('phone'))->first();
        if(!$otp){
            return abort(404);
        }else{
            if($request->otp == $otp->otp){
                if($otp->validity > date('Y-m-d H:i:s',Carbon::now()->timestamp)){
                    $user = User::where('phone_no',session()->get('phone'))->first();
                    if(!$user){
                        if(session()->has('company_name')){
                            $user = User::create([
                                'name' => session()->get('name'),
                                'phone_no'=> session()->get('phone'),
                                'role' => 'temp_manufacturer',
                                'gender' => session()->get('gender'),
                                'age' => session()->get('age'),
                                'email' => session()->get('email'),
                            ]);
                            $user->manufacturer()->create([
                                'name' => session()->get('company_name'),
                            ]);
                            $otp->delete();

                            $type = Notification_type::where("name","manufacturer-request")->first();
                            $userPharma = User::where("role","pharma")->first();

                            $notification = $type->notifications()->create([
                                'from'=>$user->id,
                                'to'=>$userPharma->id,
                                'read'=>"0",
                            ]);

                            $app = [];
                            $app[] = $userPharma->id;
                            $app[] = $type;
                            $app[] = " from ".$user->name;
                            event(new NotificationEvent($app));

                            return redirect()->route('index');
                        }else{
                            $user = User::create([
                                'name' => session()->get('name'),
                                'phone_no'=> session()->get('phone'),
                                'role' => session()->get('role')
                            ]);
                        }
                    }
                    $otp->delete();
                    Auth::login($user);
                    if(session()->get('role') == 'doctor'){
                        // if(auth()->user()->doctor_id != NULL){
                        //     $log = OnlineDoctor::all()->where('doctor_id',auth()->user()->doctor_id);
                        //     if(empty($log[0]) && auth()->user()->doctor_id){
                        //         $log = new OnlineDoctor();
                        //         $log->createNewEntry();
                        //     }
                        // }
                        return redirect()->route('doctor.dashboard');
                    }
                    else if(session()->get('role') == 'user'){

                        return redirect()->route('index');
                    }
                    else if(auth()->user()->role == 'manufacturer'){
                        return redirect()->route('manufacturer.index');
                    }
                    else if(auth()->user()->role == 'pharma'){
                        return view('pharma.dashboard.index');
                    }
                    else
                        return view('auth.register');
                }
                dd('not');
            }else{
                dd('wrong');
            }
        }

    }

    public function registerUser(){
        session()->put('role','user');
        return view('auth.register');
    }

    public function registerDoctor(){
        session()->put('role','doctor');
        return view('auth.register');
    }

}
