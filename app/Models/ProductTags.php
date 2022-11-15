<?php

namespace App\Models;
Use App\Models\Tag;
Use App\Models\Product;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTags extends Model
{
    use HasFactory;
    protected $table = 'product_tags';

    protected $fillable = 
    [
        'tags',    
    ];
}
