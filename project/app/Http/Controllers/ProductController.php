<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class ProductController extends Controller
{

    public function index()
    {
        //display tables of all products
        $products = \App\Models\Product::all()->sortBy("product");

        //pass the $products to the view where you can loop
        return view('products.index')->with('products', $products);
    }


    public function create()
    {
        //show a webform to add a new category
        return view('products.create');
    }


    public function store(Request $request)
    {
        //checks the form submittion for errors, insert into database or show error
        //dd($request);
        $rules = [
            'category_id' => 'required|max:50',
            'title' => 'required|max:50|unique:products,title,',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'sku' => 'required|max:50',
            'picture' => 'required|max:100'
        ];
        $validator = $this->validate($request, $rules);

        $product = new \App\Models\Product;
        $product->product = $request->product;
        $product->save();

        Session::flash('success','A new product has been created');
        return redirect()->route('products.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //show a web form to edit a product with values pre-filled ($id)
        $product = \App\Models\Product::find($id);
        return view('products.edit')->with('product', $product);
    }


    public function update(Request $request, $id)
    {
        //checks the form submittion for errors, update database or show error
        $rules = [
            'category_id' => 'required|max:50',
            'title' => 'required|max:50|unique:products,title,',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'sku' => 'required|max:50',
            'picture' => 'required|max:100'.$id
        ];
        $validator = $this->validate($request, $rules);

        $product = \App\Models\Product::find($id);
        $product->product = $request->product;
        $product->save();

        Session::flash('success','The product has been updated');
        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        //delete the entry with the resource id of $id
        $product = \App\Models\Product::find($id);
        if ($product !=null) {
            $product->delete();
            Session::flash('success','The product has been deleted');
        } else {
            Session::flash('error','product not found');
        } 
        return redirect()->route("products.index");
    }
}
