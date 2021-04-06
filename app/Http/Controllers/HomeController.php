<?php

namespace App\Http\Controllers;

use App\User;
use App\Manufacturer;
use App\Doctor;
use App\Pharma;
use App\OnlineDoctor;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()){
            if(auth()->user()->role == 'doctor'){
                if(auth()->user()->doctor_id != NULL){
                    $log = OnlineDoctor::all()->where('doctor_id',auth()->user()->doctor_id);
                    if(empty($log[0]) && auth()->user()->doctor_id){
                        $log = new OnlineDoctor();
                        $log->createNewEntry();
                    }
                }
                return redirect()->route('doctor.dashboard');
            }
            else if(auth()->user()->role == 'user'){
                return redirect(route('user.dashboard.profile'));
            }
            else if(auth()->user()->role == 'manufacturer'){
                return redirect()->route('manufacturer.index');
            }
            else if(auth()->user()->role == 'pharma'){
                return view('pharma.dashboard.index');
            }
        }
    }
}
