<?php

namespace App\Http\Controllers\Pharma;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Events\NotificationEvent;
use App\Notification_type;
use App\Subcategory;
use App\User;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $i = 1;
        return view('pharma.dashboard.products.manage',compact([
            'products',
            'i'
        ]));
    }

    public function create()
    {
        return view('pharma.dashboard.products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id
        ]);
        return view('pharma.dashboard.products.manage');
    }

    public function accept(Product $product){

        $product->update([
            'status'=>'accept'
        ]);
        $product->save();

        $type = Notification_type::where("name","product-accept")->first();
        $notification = $type->notifications()->create([
            'from'=>auth()->id(),
            'to'=>$product->manufacturer->user->id,
            'read'=>"0",
        ]);

        $app = [];
        $app[] = $product->manufacturer->user->id;
        $app[] = $type;
        event(new NotificationEvent($app));

        session()->flash('success','Product Added Successfully!');
        return redirect(route('products.index'));
    }

    public function reject(Product $product){
        $product->update([
            'status'=>'reject'
        ]);
        session()->flash('success','Product Rejected Successfully!');
        return redirect(route('products.index'));
    }

    public function remove(Product $product){
        $product->update([
            'status'=>'removed'
        ]);
        session()->flash('success','Product Removed Successfully!');
        return redirect(route('products.index'));
    }

    public function manageCategory(Category $category){
        $products = Product::where('category_id',$category->id)->latest()->get();
        $i = 1;
        return view('pharma.dashboard.products.manageCategory',compact([
            'products',
            'i'
        ]));
    }
    public function manageSubcategory(Subcategory $subcategory){
        $products = Product::where('subcategory_id',$subcategory->id)->latest()->get();
        $i = 1;
        return view('pharma.dashboard.products.manageSubcategory',compact([
            'products',
            'i'
        ]));
    }
}
