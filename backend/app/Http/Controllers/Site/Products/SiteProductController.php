<?php

namespace App\Http\Controllers\Site\Products;

use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\Print_;


class SiteProductController extends Controller
{

    public function index(){
        $products = Product::where('state','=',1)->get();
        return view('Frontend.product', compact('products'));
    }

    public function timKiem(Request $request){
        $keyword = $request->search;
        $arr_keyword = explode(" ", $keyword);
        $str_keyword = "%" . implode("%", $arr_keyword) . "%";
        $products = Product::where('name','like',$str_keyword)->where('state','=',1)->get();
        return view('Frontend.product', compact('products'));
    }

}
