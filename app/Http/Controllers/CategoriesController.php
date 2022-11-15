<?php

namespace App\Http\Controllers;


use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index_categories', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create_categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categories_store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);
        $categories = new Categories;
        $categories->name = $request->name;
        $categories->status = $request->status;
        $categories->save();

        return redirect()->intended('categories')->with('success', 'your categories added successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id,Categories $categories)
    {
        $categories = Categories::find($id);
        return view('/categories/show_categories',compact('categories')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Categories $categories)
    {   
        $products = Categories::find($id);
        return view('categories/edit_categories',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update_categories($id,Request $request, Categories $categories)
    {
        $categories = Categories::find($id);

        $input = $request->all();
        $categories->update($input);

        // echo "<pre>";
        // print_r($categories);
        // dd($categories);

        return redirect()->intended('categories')->with('success', 'your category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy_categories($id)
    {
        Categories::destroy($id);
        return redirect()->intended('categories')->with('success', 'your categories has been deleted successfully');
    }
}
