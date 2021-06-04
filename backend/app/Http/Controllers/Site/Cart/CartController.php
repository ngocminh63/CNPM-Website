<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use App\Models\Order;
use App\Models\OrderDetial;
class CartController extends Controller
{
    public function giohang(Request $request){
        if(!$request->session()->has('logined')){
            return view('Frontend.login');
        }else{
            return view('Frontend.giohang');
        }


    }
}
