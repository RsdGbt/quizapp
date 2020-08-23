<?php

namespace App\Http\Controllers\backend\admin\question;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Level;
use App\Model\Question;
use App\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index(){
        return redirect('admin/questions/list-question');
    }
    public function getList(Request $request){
        $user = Auth::user();
        $heading = 'Question Manager';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        if ($request->order){
            $order = $request->order;
        }else{
            $order = 'DESC';
        }
        $question = Question::orderBy('id',$order);
        if ($request->name){
            $question->where('name','like',$request->name.'%');
        }
        if ($request->level_id){
            $question->where('level_id',$request->level_id);
        }
        if ($request->category_id){
            $questionIds = QuestionCategory::where('category_id',$request->category_id)->select('question_id');
            $question->whereIn('id',$questionIds);
        }
        $questions  = $question->simplePaginate(10);
        $categories = Category::orderBy('name')->get();
        $levels = Level::orderBy('name')->get();
        return view('backend.admin.question.index',compact('title','user','heading','questions','categories','levels'));
    }
    public function create(){
        $user = Auth::user();
        $heading = 'Add New Question';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        $categories = Category::orderBy('name')->get();
        $levels = Level::orderBy('name')->get();
        return view('backend.admin.question.create',compact('title','user','heading','categories','levels'));
    }
    public function store(Request $request){
        $this->validate($request,[
             'name' => 'required|unique:questions,name',
            'level_id' => 'required',
            'category_id' => 'required',
            'marks' => 'required|numeric',
        ]);
        $question = new Question();
        $question->name = $request->name;
        $question->slug = Str::slug($request->name);
        $question->status = 'public';
        $question->user_id = Auth::user()->id;
        $question->level_id = $request->level_id;
        $question->marks = $request->marks;
        $question->neg_marks = $request->neg_marks;
        $question->save();
        if($request->category_id){
            $question->category()->sync($request->category_id);
        }
        $redirectTo = 'admin/answers/list-answers?question_id='.$question->id;
        return redirect($redirectTo)->with('success','Question created successfully ! Now you can add options for this question !!');
    }
    public function edit($id){
        $user = Auth::user();
        $heading = 'Edit Question';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        $categories = Category::orderBy('name')->get();
        $levels = Level::orderBy('name')->get();
        $question = Question::findOrFail($id);
        return view('backend.admin.question.edit',compact('title','user','heading','categories','levels','question'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|unique:questions,name,'.$id,
            'level_id' => 'required',
            'category_id' => 'required',
            'marks' => 'required|numeric',
        ]);
        $question = Question::findOrFail($id);
        $question->name = $request->name;
        $question->slug = Str::slug($request->name);
        $question->status = $request->status;
        $question->level_id = $request->level_id;
        $question->marks = $request->marks;
        $question->neg_marks = $request->neg_marks;
        $question->save();
        if($request->category_id){
            $question->category()->sync($request->category_id);
        }
        return redirect('admin/questions/list-question')->with('success','Question updated successfully !');
    }

}
