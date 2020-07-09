<?php

namespace App\Http\Controllers\frontend;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\CategoryUser;
use App\Model\Level;
use App\Model\Question;
use App\UserAnswer;
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
        $categorylevels = $category->levels;
        if (!(CategoryUser::where('category_id',$category->id)->where('user_id',$user->id)->first())){
            $userCategory = new CategoryUser();
            $userCategory->category_id = $category->id;
            $userCategory->user_id = $user->id;
            $userCategory->status = 'pending';
            $userCategory->save();
            foreach ($categorylevels as $categorylevel){
                if (count(UserLevel::where('user_id',$user->id)->where('category_id',$category->id)->get()) < count($categorylevels)){
                    if (count(UserLevel::where('user_id',$user->id)->where('category_id',$category->id)->where('level_id',$categorylevel->id)->get())==0){
                        $newLevel = new UserLevel();
                        $newLevel->category_id = $category->id;
                        $newLevel->user_id = $user->id;
                        $newLevel->level_id = $categorylevel->id;
                        $newLevel->status = 'pending';
                        $newLevel->save();
                    }
                }
            }
        }else{
            foreach ($categorylevels as $categorylevel){
                if (count(UserLevel::where('user_id',$user->id)->where('category_id',$category->id)->get()) < count($categorylevels)){
                    if (count(UserLevel::where('user_id',$user->id)->where('category_id',$category->id)->where('level_id',$categorylevel->id)->get())==0){
                        $newLevel = new UserLevel();
                        $newLevel->category_id = $category->id;
                        $newLevel->user_id = $user->id;
                        $newLevel->level_id = $categorylevel->id;
                        $newLevel->status = 'pending';
                        $newLevel->save();
                    }
                }
            }
        }
        $levelNames = $category->levels()->select('name')->get();
        return view('frontend.game.index',compact('title','heading','category','user','categorylevels','levelNames'));
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
        $questions = $category->questions()->where('level_id',$level->id)->where('status','public')->paginate(1);
        $questionIds = $category->questions()->where('level_id',$level->id)->select('question_id');
        $levelQustions = $category->questions()->where('level_id',$level->id)->get();
        return view('frontend.game.show',compact('title','heading','category','level','user','questions','questionIds','levelQustions'));
    }
    public function store(Request $request, $slug,$id){
        $this->validate($request,[
            'answer' => 'required',
            'question_id' => 'required',
        ]);
        $user = Auth::user();
        if ($user->type=='admin'){
            return redirect('')->with('error','Quiz available only for users !');
        }
        $answer = Answer::find($request->answer);
        if ($existAnswer = UserAnswer::where('user_id',$user->id)->where('question_id',$request->question_id)->first()){
            $existAnswer->answer_id = $answer->id;
            $existAnswer->status = $answer->status;
            $existAnswer->save();
        }else{
            $userAnswer = new UserAnswer();
            $userAnswer->user_id = Auth::user()->id;
            $userAnswer->question_id = $request->question_id;
            $userAnswer->answer_id = $answer->id;
            $userAnswer->status = $answer->status;
            $userAnswer->save();
        }
        $userAnswer = new UserAnswer();
        $userAnswer->user_id = Auth::user()->id;
        $userAnswer->question_id = $request->question_id;
        $userAnswer->answer_id = $answer->id;
        $userAnswer->status = $answer->status;
        $userAnswer->save();
        if ($request->page){
            $pageId = ($request->page)+1;
        }else{
            $pageId = 2;
        }
        return redirect(''.'/'.$slug.'/'.$id.'/?page='.$pageId)->with('success','Success !');
    }
}
