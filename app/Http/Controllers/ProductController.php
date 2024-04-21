<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->get();
        return view('products.list',[ 'products'=>$products]);
       
    }
    // creat page
    public function create()
    {
        return view('products.create');
    }
    // store in db
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];
        if ($request->image != "") {
            $rules['image'] = 'image';
        }
        $Validator = Validator::make($request->all(), $rules);
        if ($Validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($Validator);
        }
        // insert in db
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        if ($request->image != "") {
            // here we will store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; //unique name

            //save image name un db
            $product->image = $imageName;
            $product->save();
        }

        // save image to products dirtctory
        $image->move(public_path('/uploads/products'), $imageName);
        return redirect()->route('products.index')->with('success', 'Product added successfully :) ');
    }
    // edit page
    public function edit($id)
    {
         $product = Product::findOrFail($id);
        return view('products.edit',[
            'product'=>$product
        ]);
    }
    // update
    public function update($id ,Request $request )
    {
        $product = Product::findOrFail($id);

        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];
        if ($request->image != "") {
            $rules['image'] = 'image';
        }
        $Validator = Validator::make($request->all(), $rules);
        if ($Validator->fails()) {
            return redirect()->route('products.edit',$product->id)->withInput()->withErrors($Validator);
        }
        // update in db
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        if ($request->image != "") {
            // delete old image
            File::delete(public_path('uploads/products/'.$product->image));
            // here we will store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; //unique name

            // save image to products dirtctory
            $image->move(public_path('uploads/products'), $imageName);
            //save image name un db
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product Updated successfully  ');
    }
    // delete 
    public function destroy()
    {
    }
}
