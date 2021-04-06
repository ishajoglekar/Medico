<?php

namespace App\Http\Controllers\Manufacturer;

use App\Category;
use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Notification_type;
use App\Product;
use App\Subcategory;
use App\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = auth()->user()->manufacturer->products;
        return view('manufacturer.dashboard.products',compact(['products']));
    }
    public function addProduct()
    {
        $subcategories = Subcategory::all();
        return view('manufacturer.dashboard.add-product',compact(['subcategories']));
    }
    public function storeProduct(Request $request)
    {
        $category = Subcategory::find($request->subcategory)->category;
        $manufacturer = auth()->user()->manufacturer;
        $image = null;
        if($request->file('pic')){
            $image = $request->file('pic')->store('product');
        }
        Product::create([
            'name'=>$request->name,
            'size'=>$request->size,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'subcategory_id'=>$request->subcategory,
            'category_id'=>$category->id,
            'prescription_required'=>$request->prescription,
            'description'=>$request->description,
            'benefits'=>$request->benefits,
            'highlights'=>$request->highlights,
            'how_to_use'=>$request->how_to_use,
            'image'=>$image,
            'manufacturer_id'=>$manufacturer->id
        ]);

        $type = Notification_type::where("name","product-request")->first();
        $userPharma = User::where("role","pharma")->first();
        $notification = $type->notifications()->create([
            'from'=>auth()->id(),
            'to'=>$userPharma->id,
            'read'=>"0",
        ]);

        $app = [];
        $app[] = $userPharma->id;
        $app[] = $type;
        $app[] = " from ".auth()->user()->name;
        event(new NotificationEvent($app));

        return redirect(route('manufacturer.index'));
    }
    public function editProduct(Product $product)
    {
        $subcategories = Subcategory::all();
        return view('manufacturer.dashboard.edit-product',compact(['subcategories','product']));
    }
    public function updateProduct(Request $request,Product $product)
    {
        $category = Subcategory::find($request->subcategory)->category;
        $manufacturer = auth()->user()->manufacturer;
        $image = $product->image;
        if($request->file('pic')){
            $image = $request->file('pic')->store('product');
        }
        $product->update([
            'name'=>$request->name,
            'size'=>$request->size,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'subcategory_id'=>$request->subcategory,
            'category_id'=>$category->id,
            'prescription_required'=>$request->prescription,
            'description'=>$request->description,
            'benifits'=>$request->benifits,
            'highlights'=>$request->highlights,
            'how_to_use'=>$request->how_to_use,
            'image'=>$image,
            'manufacturer_id'=>$manufacturer->id
        ]);
        return redirect(route('manufacturer.index'));
    }
    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
