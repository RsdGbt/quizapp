<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\CategoryUser;
use App\Model\Level;
use App\Model\Question;
use App\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index($slug){
        $user = Auth::user();
        if ($user->type=='admin'){
            return redirect('')->with('error','Quiz available only for users !');
        }
        $category = Category::where('slug',$slug)->firstOrFail();
        $heading = $category->name.' - Play';
        $title = $heading.'  | Quiz App';
        $levels = $category->levels;
        if (!(CategoryUser::where('category_id',$category->id)->where('user_id',$user->id)->first())){
            $userCategory = new CategoryUser();
            $userCategory->category_id = $category->id;
            $userCategory->user_id = $user->id;
            $userCategory->status = 'pending';
            $userCategory->save();
        }
        return view('frontend.game.index',compact('title','heading','category','user','levels'));
    }
    public function show($slug,$id){
        $user = Auth::user();
        if ($user->type=='admin'){
            return redirect('')->with('error','Quiz available only for users !');
        }
        $level = Level::findOrFail($id);
        $category = Category::where('slug',$slug)->firstOrFail();
        $heading = $category->name.' - Play '.$level->name;
        $title = $heading.'  | Quiz App';
        if (!(UserLevel::where('user_id',$user->id)->where('level_id',$id)->where('category_id',$category->id)->first())){
            $userCategory = CategoryUser::where('category_id',$category->id)->where('user_id',$user->id)->firstOrFail();
            $userCategory->level_id = $id;
            $userCategory->save();

            $userLevel  = new UserLevel();
            $userLevel->user_id = $user->id;
            $userLevel->level_id = $id;
            $userLevel->category_id = $category->id;
            $userLevel->status = 'pending';
            $userLevel->save();
        }
        $questions = $category->questions()->where('level_id',$level->id)->where('status','public')->get();
        return view('frontend.game.show',compact('title','heading','category','level','user','questions','questionIds'));
    }
    public function store(Request $request, $slug,$id){
        $user = Auth::user();
        if ($user->type=='admin'){
            return redirect('')->with('error','Quiz available only for users !');
        }
//        dd($request->answer);
        dd($request->question_id);
    }
}
