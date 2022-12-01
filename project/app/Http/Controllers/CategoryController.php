<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class CategoryController extends Controller
{

    public function index()
    {
        //display tables of all categories
        $categories = \App\Models\Category::all()->sortBy("category");

        //pass the $categories to the view where you can loop
        return view('categories.index')->with('categories', $categories);
    }


    public function create()
    {
        //show a webform to add a new category
        return view('categories.create');
    }


    public function store(Request $request)
    {
        //checks the form submittion for errors, insert into database or show error
        //dd($request);
        $rules = [
            'category' => 'required|max:50|unique:categories,category'
        ];
        $validator = $this->validate($request, $rules);

        $category = new \App\Models\Category;
        $category->category = $request->category;
        $category->save();

        Session::flash('success','A new category has been created');
        return redirect()->route('categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //show a web form to edit a category with values pre-filled ($id)
        $category = \App\Models\Category::find($id);
        return view('categories.edit')->with('category', $category);
    }


    public function update(Request $request, $id)
    {
        //checks the form submittion for errors, update database or show error
        $rules = [
            'category' => 'required|max:50|unique:categories,category,'.$id
        ];
        $validator = $this->validate($request, $rules);

        $category = \App\Models\Category::find($id);
        $category->category = $request->category;
        $category->save();

        Session::flash('success','The category has been updated');
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        //delete the entry with the resource id of $id
        $category = \App\Models\Category::find($id);
        if ($category !=null) {
            $category->delete();
            Session::flash('success','The category has been deleted');
        } else {
            Session::flash('error','category not found');
        } 
        return redirect()->route("categories.index");
    }
}
