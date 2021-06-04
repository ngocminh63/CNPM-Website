<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Str;
use App\Components\Recursive;
use App\Components\CheckSearch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Print_;

class ProductController extends Controller
{

    public function index(){
        $products = Product::latest()->paginate(3);
        return view('Backend.product.listproduct', compact('products'));
    }
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('Backend.product.addproduct', compact('htmlOption'));
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
            // Upload ảnh lên server
            $file->move($path, $file_name);
            // Lưu tên ảnh vào CSDL
            $product->image = $file_name;
        }
        $product->save();
        return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');
    }

    public function edit($id){
        $product = Product::find($id);
        $htmlOption = $this->getCategory($parentId = $product->categories_id);

        return view('Backend.product.editproduct', compact('htmlOption','product'));
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
            // Upload ảnh lên server
            $file->move($path, $file_name);
            // Xóa ảnh cũ
            unlink($path.'/'.$product->image);
            // Lưu tên ảnh vào CSDL
            $product->image = $file_name;
            // Khi thay đổi ảnh, thì phải xóa ảnh cũ trong thư mục uploads
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


    public function search(Request $request){
        $keyword = $request->input('keyword');
        $choose = $request->input('choose');
        $check = new CheckSearch();
        $table = $check->checkChoose($choose);

        $checkState = $check->checkState($choose,$keyword);

        $str_key = $check->checkSearch($checkState);
        $products = DB::table('products')
            ->join('categories','products.categories_id', '=', 'categories.id')
            ->where($table.'.'.$choose, 'like', $str_key)
            ->select('products.id','products.name','code','image','price','state','cate_name')
            ->get();
            //Print_r($products);
       return view('Backend.product.search', compact('products'));
    }
}
