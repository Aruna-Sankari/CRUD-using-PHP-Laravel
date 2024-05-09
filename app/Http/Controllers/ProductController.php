<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class ProductController extends Controller
{
    public function index()
    {
        $products = Items::latest()->paginate(4);
        return view('products.index', ['products' => $products]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        //    dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'mrp' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:10000',

        ]);

        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path('pictures'), $imageName);

        $product = new Items;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->save();
        return back()->withSuccess('Product Details Added Successfully...');




    }
    public function show($id)
    {
        $product = Items::where('id', $id)->first();
        return view('products.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Items::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'mrp' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10000',

        ]);
        $product = Items::where('id', $id)->first();

        if (isset($request->image)) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('pictures'), $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->save();
        return back()->withSuccess('Updated Successfully...');

    }
    public function destroy($id){
        $product = Items::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Detail Deleted Successfully...');


    }
}

