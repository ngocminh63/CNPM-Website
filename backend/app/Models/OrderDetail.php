<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'quantity', 'products_id', 'orders_id'
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class,'products_id', 'id');
    }
}
