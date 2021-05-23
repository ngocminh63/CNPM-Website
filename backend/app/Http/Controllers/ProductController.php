<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Str;
use App\Components\Recursive;
use App\Components\CheckSearch;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Print_;

class ProductController extends Controller
{

    public function index(){
        $products = Product::latest()->paginate(3);
        return view('product.listproduct', compact('products'));
    }
    
}
