<?php

namespace App\Http\Controllers\Pharma;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\Pharma\CreateCategoryRequest;
use App\Http\Requests\Pharma\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $i = 1;
        return view('pharma.dashboard.categories.manage',compact([
            'categories',
            'i'
        ]));
    }

    public function create()
    {
        return view('pharma.dashboard.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create([
            'name'=>$request->name
        ]);
        session()->flash('success','Category Added Successfully!');
        return redirect(route('categories.index'));
    }


    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('pharma.dashboard.categories.edit',compact([
            'category'
        ]));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->only(['name']);
        $category->update($data);
        // dd($category);
        session()->flash('success','Category Updated Successfully!');
        return redirect(route('categories.index'));
    }


    public function destroy(Category $category)
    {
        $category = Category::where("id",$category->id);
        $category->forceDelete();
        session()->flash('success','Category Deleted Successfully');
        return redirect()->back();
    }

    public function viewCategoryProducts($category){
        // dd($category);
        $categories = Category::all();
        $singleCategory = Category::where('id',$category)->first();
        $subCategories = $singleCategory->subcategories()->get();
        $products = $singleCategory->products()->where('status','accept')->get();
        $isInCart = false;
        $quantity = 1;

        return view('pharma.category',compact([
            'products','subCategories','categories','singleCategory','isInCart','quantity'
        ]));
    }


}
