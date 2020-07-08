<?php

namespace App\Http\Controllers\backend\admin\category;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return redirect('admin/categories/list-category');
    }
    public function getList(){
        $user = Auth::user();
        $heading = 'Categories';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        $categories = Category::orderBy('name')->get();
        return view('backend.admin.category.index',compact('title','user','heading','categories'));
    }
    public function create(){
        $user = Auth::user();
        $heading = 'Add New Category';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        $levels = Level::orderBy('name')->get();
        return view('backend.admin.category.create',compact('title','user','heading','levels'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:categories,name',
            'level_id' => 'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->user_id = Auth::user()->id;
        $category->status = 'public';
        $category->save();
        $category->levels()->sync($request->level_id);
        return back()->with('success','Category saved successfully !');
    }
    public function edit($id){
        $user = Auth::user();
        $category = Category::findOrFail($id);
        $heading = 'Edit Category | '.$category->name;
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        $levels = Level::orderBy('name')->get();
        return view('backend.admin.category.edit',compact('title','user','heading','category','levels'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|unique:categories,name,'.$id,
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        $category->levels()->sync($request->level_id);
        return redirect('admin/categories/list-category')->with('success','Category saved successfully !');
    }

}
