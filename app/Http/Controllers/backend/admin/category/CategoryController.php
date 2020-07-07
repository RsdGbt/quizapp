<?php

namespace App\Http\Controllers\backend\admin\category;

use App\Http\Controllers\Controller;
use App\Model\Category;
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
        return view('backend.admin.category.create',compact('title','user','heading'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:categories,name',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->user_id = Auth::user()->id;
        $category->status = 'public';
        $category->save();
        return back()->with('success','Category saved successfully !');
    }

}
