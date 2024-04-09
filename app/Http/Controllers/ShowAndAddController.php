<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowAndAddController extends Controller
{
    public function select(){
        $product = Product::all();
        return view('showandadd.select')->with('products', $product);
    }
    public function add(){

        $cateid = Category::all();
        return view('showandadd.add')->with('categories', $cateid);
    }
    public function save(Request $request){
        $request->validate([
            'name'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
            'quantity_in_stock'=> 'required',
            'categoryid'=> 'required',
            'image'=>'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $product = new Product();

        $file= $request->file('image');

        $extension = $file->getClientOriginalExtension();

        $imageName= 'test_'.time().'.'.$extension;

        $path = Storage::putFileAs('public', $file, $imageName);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $imageName;
        $product->quantity_in_stock = $request->quantity_in_stock;
        $product->categoryid = $request->categoryid;

        $product->save();
        // Validation passed, continue with your code logic here
        // Product::create($request->all());
        return redirect()->route('select')->with('message','Product added successfully.');
    }

    public function detail(Request $request,Product $product){
        // $product = Product::find($product->id);
        return view('showandadd.detail')->with('product', $product);
    }
    public function delete(Request $request,Product $product){
        $product->delete();
        return redirect()->route('select')->with(['error' => 'Product deleted successfully']);
    }
    public function edit(Request $request,Product $product){
        $cateid = Category::all();
        return view('showandadd.edit')->with('product', $product)->with('categories', $cateid);
    }
    public function savedit(Request $request,Product $product){
        // dd($product);
        $product->name= $request->name;
        $product->description= $request->description;
        $product->price = $request->price;
        $product->quantity_in_stock = $request->quantity_in_stock;
        $product->categoryid= $request->categoryid;

        $product->save();
        return redirect()->route('select')->with(['message'=> 'Product has been updated successfully']);
    }
}
