<?php

namespace App\Http\Controllers\Site\Products;

use App\Models\Product;

use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Print_;


class SiteProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return view('Frontend.product', compact('products'));
    }

}
