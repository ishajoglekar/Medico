<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $isInCart = false;
        $quantity = 1;
        $cart = auth()->user()->cart;
        if ($cart) {
            $products = $cart->products;
            foreach ($products as $item) {
                if ($item->id == $product->id) {
                    $quantity = $item->pivot->quantity;
                    if ($quantity >= 1)
                        $isInCart = true;
                }
            }
        }
        // dd($isInCart);
        return view('user.pharma.single_product', compact(['product', 'isInCart', 'quantity']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function addToCart(Request $request)
    {

        $count = 0;
        $isInCart = false;
        $product = Product::find($request->product_id);
        $cart = auth()->user()->cart;
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => auth()->user()->id
            ]);
        }
        // dd($cart);
        $quantity = 1;
        // dd(auth()->user()->cart->products);
        $products = $cart->products;
        foreach ($products as $item) {
            if ($item->id == $product->id) {
                $isInCart = true;
            }
            $count += 1;
        }
        // dd($isInCart);
        if (!$isInCart) {
            $cart->products()->attach($product->id, ['quantity' => 1]);
            $count += 1;
            // dd($count);
        }

        // dd($cart->products->count());
        return json_encode(['count' => $count]);
    }
    public function updateQuantity(Request $request)
    {

        $products = auth()->user()->cart->products;
        $count = auth()->user()->cart->products->count();
        // dd($count);
        foreach ($products as $item) {
            if ($item->id == $request->product_id && $request->quantity <= 0) {

                auth()->user()->cart->products()->detach($item->id);
                $count--;
                // dd($count);
                return json_encode(['quantity' => 0, 'finalAmount' => $this->getFinalAmmount(auth()->user()->cart->products, $item->id, $request->quantity), 'count' => $count]);
            } else if ($item->id == $request->product_id && $request->quantity > 0) {
                auth()->user()->cart->products()->updateExistingPivot($item, array('quantity' => $request->quantity), false);
                $quantityy = $item->pivot->quantity;
                // dd($quantityy);
                return json_encode(['quantity' => $quantityy, 'finalAmount' => $this->getFinalAmmount(auth()->user()->cart->products, $item->id, $request->quantity), 'count' => $count]);
            }
        }
        return null;
    }

    public function getFinalAmmount($products, $item, $quantity)
    {

        $finalAmount = 0;
        foreach ($products as $product) {
            // dd($product->pivot->quantity);
            if ($product->id == $item) {
                $finalAmount += $product->price * $quantity;
            } else {
                $finalAmount += $product->price * $product->pivot->quantity;
            }
        }
        return $finalAmount;
    }
}
