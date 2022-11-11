<?php

namespace App\Models;
Use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'products_images';

    protected $fillable = 
    [
        'id',
        'path',
        'product_id',
    ];
    public function productImage()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    
   
}
