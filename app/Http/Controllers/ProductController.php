<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $product = Product::all();
        // return view('products.index_product', compact('product'));
    }


    public function index_products()
    {
        $products = Product::all();
        return view('products.index_product', compact('products'));
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
            'primary_image'         => 'required',
            'price'         => 'required',
            'categories'         => 'required',
            'tags'         => 'required',
        ]);

        if ($request->hasFile('primary_image')) {
          $image = $request->file('primary_image');
          foreach ($image as $files) {
              $destinationPath = 'public/images/';
              $file_name = time() . "." . $files->getClientOriginalExtension();
              $files->move($destinationPath, $file_name);
              $data[] = $file_name;
          }
      }
      $file= new Product();
      $file->primary_image=json_encode($data);
      
        $products = new Product;
        $products->title = $request->title;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        $products->primary_image =$file;
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

    

    
    public function show_product($id ,Product $products)
    {   
        $products = Product::find($id);
        return view('products/show_product',compact('products')); 
    }
    
    public function edit($id,Product $products)
    {
        $products = Product::find($id);
        return view('products/edit_product',compact('products'));
    }

    public function update($id, Request $request , Product $products)
    {
        $request->validate([
            'title'                     => 'required',
            'short_description'         => 'required',
            'long_description'         => 'required',
            'primary_image'         => 'required',
            'price'         => 'required',
            'categories'         => 'required',
            'tags'         => 'required',
        ]);
        $products->fill($request->post())->save();

        return view('products/index_product')->with('success', 'your product has been updated successfully');
    }

    public function destroy($id)
    {
        $products->destroy($id);
        
        return redirect()->intended('admin')->with('success', 'your record has been deleted successfully');
        // return redirect()->route('index')->with('success', 'your record has been deleted successfully');
    }
}