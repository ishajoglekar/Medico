<?php

namespace App\Http\Controllers\Manufacturer;

use App\Category;
use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manufacturer\StoreManufacturerRequest;
use App\Manufacturer;
use App\Notification_type;
use App\Product;
use App\Subcategory;
use App\User;
use Illuminate\Http\Request;

class ManufacturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('manufacturer.dashboard.profile',compact(['user']));
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
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        dd($manufacturer);
        $user = $manufacturer;
        return view('manufacturer.dashboard.edit',compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->manufacturer->update([
            'name'=>$request->company_name,
            'description'=>$request->description
        ]);
        return redirect(route('manufacturer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        //
    }

    public function register(){

        $user = auth()->user();
        return view('manufacturer.register',compact([
            'user'
        ]));
    }

    public function storeManufacturer(StoreManufacturerRequest $request)
    {
        // dd($request);
        $user = User::find(auth()->id());

        $type = Notification_type::where("name","manufacturer-request")->first();
        $userPharma = User::where("role","pharma")->first();
        // dd(User::where("role","pharma"));
        $notification = $type->notifications()->create([
            'from'=>auth()->id(),
            'to'=>$userPharma->id,
            'read'=>"0",
        ]);

       

        $app = [];
        $app[] = $userPharma->id;
        $app[] = $type;
        $app[] = " by ".auth()->user()->name;
        event(new NotificationEvent($app));

        $user->update([
            'role' => 'temp_manufacturer'
        ]);

        Manufacturer::create([
            'name' => $request->company_name,
            'user_id' => $user->id
        ]);

        return redirect(route('index'));
    }

    public function editmanufacturer(User $user)
    {
        return view('manufacturer.dashboard.edit',compact(['user']));
    }
}
