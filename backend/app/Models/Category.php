<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cate_name','parent_id','slug'];
    public function products()
    {
        return $this->hasMany(Product::class,'categories_id', 'id');
    }
}
