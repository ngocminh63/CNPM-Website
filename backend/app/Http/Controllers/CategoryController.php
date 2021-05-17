<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use App\Components\Recursive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){
        $categories = $this->category->latest()->paginate(4);
        return view('category.index', compact('categories'));
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId = '');

        return view('category.add',compact('htmlOption'));
    }
    public function store(AddCategoryRequest $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        
        return redirect()->route('cate-index')->with('success', 'Thêm danh mục thành công');
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);

        return $htmlOption;
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, EditCategoryRequest $request){
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('cate-index')->with('success', 'Sửa danh mục thành công');
    }

    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('cate-index')->with('success', 'Xóa danh mục thành công');
    }
   


}
