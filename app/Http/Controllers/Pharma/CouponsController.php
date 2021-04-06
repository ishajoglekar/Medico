<?php

namespace App\Http\Controllers\Pharma;
use App\Http\Requests\Pharma\CreateCouponRequest;
use App\Http\Requests\Pharma\UpdateCouponRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;

class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderby('valid_till','desc')->get();
        $i = 1;
        return view('pharma.dashboard.coupons.manage',compact([
            'coupons',
            'i'
        ]));
    }

    public function create()
    {
        return view('pharma.dashboard.coupons.create');
    }

    public function edit(Coupon $coupon)
    {
        return view('pharma.dashboard.coupons.edit',compact([
            'coupon'
        ]));
    }

    public function store(CreateCouponRequest $request)
    {
        $coupon = Coupon::create([
            'code'=>$request->code,
            'min_amount'=>$request->min_amount,
            'valid_till'=>$request->valid_till,
            'max_discount'=>$request->max_discount
        ]);
        return redirect()->route('coupons.index');
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $data = $request->only(['code','min_amount','max_discount','valid_till']);
        $coupon->update($data);
        session()->flash('success','Coupon Updated Successfully!');
        return redirect(route('coupons.index'));
    }

    public function check(Request $request){
        $presentCoupon = Coupon::where('code',$request->coupon)->first();
        // dd($request->coupon);
        if($presentCoupon){
            $user = $presentCoupon->users()->where('user_id',auth()->user()->id)->first();

            if($user){
                return json_encode(['status'=>false,'reason'=>'Coupon already used!']);
            }
            // auth()->user()->coupons()->attach($presentCoupon->id);
            if($request->amount>=$presentCoupon->min_amount){
                session()->put('coupon',$presentCoupon->code);
                return json_encode(['status'=>true,'coupon'=>$presentCoupon]);
            }else{
                return json_encode(['status'=>true,'reason'=>'Not Sufficient Amount!']);
            }
        }
        return json_encode(['status'=>false,'reason'=>'Coupon not present!']);

    }
}
