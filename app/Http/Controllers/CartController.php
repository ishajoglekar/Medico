<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cart = Cart::where('user_id',auth()->user()->id)->first();
        // dd(auth()->user()->id);
        $cart = auth()->user()->cart;
        
        if(!$cart){
            $cart = Cart::create([
                'user_id'=>auth()->user()->id
            ]);
        }
        $products = $cart->products;
        // dd($cart);
        // dd($products);
        // dd($cart->products);
        $finalAmount=0;
        foreach($products as $product){
            // dd($product->pivot->quantity);
            $finalAmount += ($product->price * $product->pivot->quantity);
        }
        return view('pharma.dashboard.cart.index',compact([
            'products',
            'finalAmount'
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkout(){
        $cart = Cart::where('user_id',auth()->user()->id)->first();
        $products = $cart->products;
        $pres_req = [];
        $finalAmount =0;
        $addresses = auth()->user()->addresses;
        // dd($products);
        foreach($products as $product){
            // dd($product->pivot->quantity);
            $finalAmount += $product->price * $product->pivot->quantity;
        }
        // dd($addresses->count());
        foreach($products as $product){
            if($product->prescription_required == 1){
                $pres_req[] = $product->id;
            }
        }

        // dd($pres_req);
        return view('pharma.dashboard.cart.checkout',compact([
            'products',
            'pres_req',
            'addresses',
            'finalAmount'
        ]));
    }

    public function placeOrder(Request $request){
        $coupon = Coupon::where('code',$request->coupon)->first();
        $reason = 'Order Placed!';
        if($coupon){
             auth()->user()->coupons()->attach($coupon->id);
             $reason ='Order Placed with Coupons!';
            //  return json_encode(['reason'=>'Order Placed with Coupons!']);
        }
        $cart = Cart::where('user_id',auth()->user()->id)->first();

        // dd($cart);
        $products = $cart->products;
         $order = Order::create([
            'user_id'=>auth()->user()->id,
            'address_id'=>1,
            'billing_name'=>auth()->user()->name,
            'email'=>auth()->user()->email,
        ]);
        foreach($products as $product){

            auth()->user()->products()->attach($product->id,['count'=>$product->pivot->quantity,'order_id'=>$order->id]);
            if($coupon){
                $coupon->users()->updateExistingPivot(auth()->user(),array('order_id' => $order->id),false);
            }
            $product->update(['quantity'=>($product->quantity - $product->pivot->quantity)]);

            $cart->products()->detach($product->id);

        }

        return json_encode(['reason'=>$reason]);
    }
}
