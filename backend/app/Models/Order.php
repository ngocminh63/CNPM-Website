<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
public function details()
{
    return $this->hasMany(OrderDetail::class, 'orders_id', 'id');
}

public function customer()
{
    return $this->belongsTo(Customer::class, 'customers_id', 'id');
}

public function ship()
{
    return $this->belongsTo(Ship::class, 'ships_id', 'id');
}
}
