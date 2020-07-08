<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'Quiz App';
        $categories = Category::where('status','public')->withCount('users')->orderBy('users_count','DESC')->get();
        return view('frontend.welcome',compact('title','categories'));
    }
}
