<?php

namespace App\Models;
use App\Models\ProductTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $table = 'tags';

    protected $fillable = 
    [
        'name',
        'status',
    ];

  
    public function tag() {

        return $this->belongsTo('App\Models\Tags');

    }
}
