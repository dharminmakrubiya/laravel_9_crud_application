<?php

namespace App\Models;

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


    public function product_images() 
		{
			return $this->hasMany('products_images', 'id');
		}
}
