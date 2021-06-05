<?php

namespace App\Http\Controllers\Site\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class SiteProductController extends Controller
{
    public function index(){
        return view('Frontend.product');
    }
}
