<?php

namespace App\Http\Controllers\Pharma;

use App\Http\Requests\Pharma\CreateSubcategoryRequest;
use App\Http\Requests\Pharma\UpdateSubcategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use App\Product;
use App\Products;

class SubcategoriesController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::latest()->get();
        $i=1;
        return view('pharma.dashboard.subcategories.manage',compact([
            'subcategories',
            'i'
        ]));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pharma.dashboard.subcategories.create',compact([
            'categories'
        ]));
    }

    public function store(CreateSubcategoryRequest $request)
    {
        $subcategory = Subcategory::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id
        ]);
        return view('pharma.dashboard.subcategories.manage');
    }
    public function edit(Subcategory $subcategory)
    {
        return view('pharma.dashboard.subcategories.edit',compact([
            'subcategory'
        ]));
    }

    public function update(UpdateSubCategoryRequest $request, Subcategory $subcategory)
    {
        $data = $request->only(['name']);
        $subcategory->update($data);
        //dd($category);
        session()->flash('success','Subcategory Updated Successfully!');
        return redirect(route('subcategories.index'));
    }


    public function destroy(Subcategory $subcategory)
    {
        $subcategory = Subcategory::where("id",$subcategory->id);
        $subcategory->forceDelete();
        session()->flash('success','Subcategory Deleted Successfully');
        return redirect()->back();
    }
    public function viewSubCategory($category, $subcategory)
    {
        // dd($subcategory);
        $products = Product::where([['subcategory_id','=',$subcategory],['status','=','accept']])->get();
        $categories = Category::all();
        // $category
        $singleCategory = Category::where('id',$category)->first();
        $subCategories = $singleCategory->subcategories()->get();
        // dd($products);
        $isInCart = false;
        $quantity = 1;


        return view('pharma.subcategory',compact([
            'products','subCategories','categories','singleCategory','isInCart','quantity'
        ]));
    }
}
