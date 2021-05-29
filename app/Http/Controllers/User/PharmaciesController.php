<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use App\Order;
use App\Pharma;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmaciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Pharma  $pharma
     * @return \Illuminate\Http\Response
     */
    public function show(Pharma $pharma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharma  $pharma
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharma $pharma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharma  $pharma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharma $pharma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharma  $pharma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharma $pharma)
    {
        //
    }
    public function showOrders(){
        $user = auth()->user();
        $orders = Order::where('user_id',$user->id)->get();
// dd($orders);
        $productDetails = [];
        foreach($orders as $order){
            $address = Address::where('id',$order->address_id)->first('address');
            // dd($address);
            $billingName= $order->billing_name;
            $email= $order->email;
            $products = $user->products;
            // dd($products);
            
            foreach($products as $product){
                // dd($product->pivot->count);
                $productDetail = [];
                $productDetail[] = $order->billing_name;
                $productDetail[] = $address->address;
                $productDetail[] = $product->name;
                $productDetail[] = $product->pivot->count;
                $productDetail[] = $product->price;
                $productDetail[] = $product->price * $product->pivot->count;

                $productDetails[] = $productDetail;

            }
        }

        // dd($productDetails);
        return view('user.dashboard.orders.index', compact([
            'productDetails'
        ]));


    }

    public function showReports(){
        $user = auth()->user();

        $tests = DB::select("SELECT * FROM tests WHERE id in(select test_id from users_tests where user_id = $user->id)");
        return view('user.dashboard.medicalReports', compact([
            'user',
            'tests'
        ]));
    }
}
