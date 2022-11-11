<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    
    use HasFactory;
    protected $table = 'products';

    protected $fillable = 
    [
        'title',
        'short_description',
        'long_description',
        'primary_image',
        'price',
        'categories',
        'tags',
    ];
    
    public function product() 
		{
			return $this->belongsTo('products', 'id');
		}
    
}
