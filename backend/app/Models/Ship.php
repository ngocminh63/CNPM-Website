<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = ['tenTing','gia'];
    public function orders()
    {
        return $this->hasMany(Order::class,'ships_id', 'id');
    }

}
