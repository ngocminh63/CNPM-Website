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
    
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('product.addproduct', compact('htmlOption'));
    }

    public function getCategory($parentId){
        $data = Category::all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);

        return $htmlOption;
    }

    public function store(AddProductRequest $request){
        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->state = $request->state;
        $product->categories_id = $request->categories_id;
        
        if($request->hasFile('image')){
            $file = $request->image;
            $file_name = Str::slug($request->name).'.'.$file->getClientOriginalExtension();
            $path = public_path().'/uploads';
            $file->move($path, $file_name);
            $product->image = $file_name;
        }
        $product->save();
        return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');
    }

    public function edit($id){
        $product = Product::find($id);
        $htmlOption = $this->getCategory($parentId = $product->categories_id);

        return view('product.editproduct', compact('htmlOption','product'));
    }
    public function update(EditProductRequest $request, $id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->state = $request->state;
        $product->categories_id = $request->categories_id;

        if($request->hasFile('image')){
            $file = $request->image;
            $file_name = Str::slug($request->name).'.'.$file->getClientOriginalExtension();
            $path = public_path().'/uploads';
            $file->move($path, $file_name);
            unlink($path.'/'.$product->image);
            $product->image = $file_name;
        }else{
            $product->image = $product->image;
        }
        $product->save();
        return redirect()->route('product.index')->with('success','Sửa sản phẩm thành công');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công');
    }
}
