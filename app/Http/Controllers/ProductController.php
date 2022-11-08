<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()  
    {  
        
          
    }  


    public function index_products()
    {
        return view('products.index_product');
    }

    public function create_product()
    {
        return view('products.create_product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'                     => 'required',
            'short_description'         => 'required',
            'long_description'         => 'required',
            'primary_image'         => 'required|image|mimes:jpg,png,jpeg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'price'         => 'required',
            'categories'         => 'required',
            'tags'         => 'required',
        ]);
        // echo '<pre>';
        // print_r($request->all());
        // die();

        $file_name = time() . '.' . request()->primary_image->getClientOriginalExtension();
        request()->primary_image->move(public_path('public/images'), $file_name);
        $products = new Product;
        $products->title = $request->title;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        $products->primary_image =$file_name;
        $products->price = $request->price;
        $products->categories = $request->categories;
        $products->tags = $request->tags;
        
        // dd($products);
        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
        // die();
        $products->save();
        
        return redirect()->intended('admin')->with('success', 'Your product added successfully.');
        // return redirect()->intended('admin')
        //                 ->withSuccess('Your product Successfully added');
    }

   
   
}
