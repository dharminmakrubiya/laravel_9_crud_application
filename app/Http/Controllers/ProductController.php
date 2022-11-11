<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index_products()
    {

        $products_all = Product::all();
        return view('products.index_product', compact('products_all'));

        session()->flash('messages', $messages);
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
            'files'        => 'required',
            'price'         => 'required',
            'categories'         => 'required',
            'tags'         => 'required',
        ]);

        $file_name = time() . '.' . request()->primary_image->getClientOriginalExtension();
        request()->primary_image->move(public_path('images'), $file_name);
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

        // $files = [];
        // if ($request->file('files')){
        //     foreach($request->file('files') as $image)
        //     {
        //         $imageName = $image->getClientOriginalName();
        //         $image -> move(public_path().'/product_images/',$imageName);
        //         $fileNames[]=$imageName;
        //     }
        // }
        // $images = json_encode($fileNames);
        // ProductImage::create(['path'=>$images]);
        $files = [];
        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('product_images'), $fileName);
                $files[]['path'] = $fileName;
            }
        }
        foreach ($files as $key => $file) {
            ProductImage::create($file);
        }

        
        
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

        
        $products = Product::with('productImg')->find($id);
        // echo "<pre>";
        // print_r($products->toArray());
        // die();
        return view('products/edit_product',compact('products'));
    }

    public function update($id, Request $request, Product $products)
    {
        
        $products = Product::find($id);
        $input = $request->all();
        $products->update($input);
        
        // echo "<pre>";
        // print_r($products);
        // dd($products);
        
        return redirect()->intended('products')->with('success', 'your product has been updated successfully');
        // return view('products/index_product')->with('success', 'your product has been updated successfully');
    }
    
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->intended('products')->with('success', 'your record has been deleted successfully');
    }
}