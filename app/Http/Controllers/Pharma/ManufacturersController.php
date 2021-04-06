<?php

namespace App\Http\Controllers\Pharma;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManufacturersController extends Controller
{
    public function index()
    {
        $users = User::where('role','temp_manufacturer')->orWhere('role','manufacturer')->get();
        return view('pharma.dashboard.manufacturer.manage-manufacturer',compact(['users']));
    }
    public function accept(Request $request,User $user)
    {
        if($user->password){
            $user->update([
                'role'=>'manufacturer'
            ]);
        }else{
            $user->update([
                'role'=>'manufacturer',
                'password'=>Hash::make('PractoManufacturer@12345')
            ]);
        }
        return redirect()->back();
    }
    public function reject(Request $request,User $user)
    {
        //$user->manufacturer->delete();
        $user->update([
            'role'=>'user'
        ]);
        return redirect()->back();
    }
}
