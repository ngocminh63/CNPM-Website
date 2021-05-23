<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','code','price','state','image','categories_id','address','slug'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
