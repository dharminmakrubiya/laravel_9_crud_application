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
      $file->name=json_encode($data);
      
        // echo '<pre>';
        // print_r($request->all());
        // die();

        // $file_name = time() . '.' . request()->primary_image->getClientOriginalExtension();
        // request()->primary_image->move(public_path('public/images'), $file_name);
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

   
   
}
