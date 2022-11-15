<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tags::all();
        return view('tags.index_tags', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create_tags');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tagstore(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);
        $tags = new Tags;
        $tags->name = $request->name;
        $tags->status = $request->status;
        $tags->save();

        return redirect()->intended('tags')->with('success', 'your Tags added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show($id,Tags $tags)
    {
        $tags = Tags::find($id);
        return view('/tags/show_tags',compact('tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Tags $tags)
    {
        $products = Tags::find($id);
        return view('tags/edit_tags',compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update_tags($id,Request $request, Tags $tags)
    {
        $tags = Tags::find($id);

        $input = $request->all();
        $tags->update($input);

        // echo "<pre>";
        // print_r($categories);
        // dd($categories);

        return redirect()->intended('tags')->with('success', 'your category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tags::destroy($id);
        return redirect()->intended('tags')->with('success', 'your Tags has been deleted successfully');
    }
}
