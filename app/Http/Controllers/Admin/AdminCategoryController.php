<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class AdminCategoryController extends AdminBaseController
{

    public function index(){
        $categories = Category::all();
        return view('admin.layouts.posts.category.index',compact('categories'));
    }

    public function show($slug){
        $category = Category::findBySlugOrFail($slug);
        return view('admin.layouts.posts.category.show',compact('category'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.layouts.posts.category.create',compact('categories'));
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'order' => 'numeric'
        ]);
        $category = Category::create($data);
        if(isset($category)){
            flash()->success('success', 'Category created');
            return redirect()->route('category.index');
        }
        return redirect()->back();
    }

    public function edit($slug){
        $categories = Category::pluck('name','id')->toArray();
        $category = Category::findBySlugOrFail($slug);
        return view('admin.layouts.posts.category.edit',compact('categories','category'));
    }

    public function update(){
        $data = request()->validate([
            'name' => 'required',
            'order' => 'numeric',
            'parent_id' => 'numeric'
        ]);
        $category = Category::findBySlugOrFail(request()->input('slug'));
        $update = $category->update($data);
        if($update){
            flash()->success('success', 'Category updated');
            return redirect()->route('category.index');
        }
        return redirect()->back();
    }

    public function destroy(){
        $ids = request()->input('ids');
        if(is_array(explode(",",$ids))){
            $category = DB::table("categories")->whereIn('id',explode(",",$ids))->delete();
            //Category::destroy($ids);
            return response()->json(['success'=>"category Deleted successfully."]);
        }else {
            $category = Category::findOrFail($ids);
            $category->delete();
            return response()->json(['success' => "Category Deleted successfully."]);
        }
    }
}
