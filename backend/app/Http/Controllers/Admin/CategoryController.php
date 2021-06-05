<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use App\Components\Recursive;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(4); // Providers/appServiceProvider
        return view('Backend.category.index', compact('categories'));
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId = '');

        return view('Backend.category.add',compact('htmlOption'));
    }
    public function store(AddCategoryRequest $request){
        Category::create([
            'cate_name' => $request->cate_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->cate_name)
        ]);
        
        return redirect()->route('cate-index')->with('success', 'Thêm danh mục thành công');
    }

    public function getCategory($parentId){
        $data = Category::all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);

        return $htmlOption;
    }

    public function edit($id){
        $category = Category::find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('Backend.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, EditCategoryRequest $request){
        Category::find($id)->update([
            'cate_name' => $request->cate_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->cate_name)
        ]);
        return redirect()->route('cate-index')->with('success', 'Sửa danh mục thành công');
    }

    public function delete($id){
        Category::find($id)->delete();
        return redirect()->route('cate-index')->with('success', 'Xóa danh mục thành công');
    }
   


}
