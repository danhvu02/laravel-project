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
        //display tables of all categories
        $categories = \App\Models\Category::all()->sortBy("category");

        //show a webform to add a new product with dropdown option for category id
        return view('products.create')->with('categories', $categories);
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
            'picture' => 'required|mimes:jpg,png,jeg|max:5048'
        ];
        $validator = $this->validate($request, $rules);

        $newPictureName = time() . '-' . $request->name . '.' . 
        $request->picture->extension();
        $request->picture->move(public_path('images'), $newPictureName);

        $product = new \App\Models\Product;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->sku = $request->sku;
        $product->picture = $request->picture;
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

        //display tables of all categories
        $categories = \App\Models\Category::all()->sortBy("category");

        //show a web form to edit a product with values pre-filled ($id)
        $product = \App\Models\Product::find($id);
        return view('products.edit')->with('product', $product)->with('categories', $categories);
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
            'picture' => 'required|mimes:jpg,png,jeg|max:5048'.$id
        ];
        $validator = $this->validate($request, $rules);

        

        $product = \App\Models\Product::find($id);
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->sku = $request->sku;
        $product->picture = $request->picture;
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
