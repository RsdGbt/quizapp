<?php

namespace App\Http\Controllers\backend\admin\answers;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Level;
use App\Model\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AnswerController extends Controller
{
    public function index(){
        return redirect('admin/answers/list-answers');
    }
    public function getList(Request $request){
        if (!($request->question_id)){
            return redirect('admin/questions/list-question');
        }
        $question = Question::find($request->question_id);
        $user = Auth::user();
        $heading = 'Answers Manager for "'.$question->name .'" Question';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        $answers = Answer::where('question_id',$request->question_id)->orderBy('id','DESC')->get();
        return view('backend.admin.answers.index',compact('title','user','heading','question','answers'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'question_id' => 'required',
            'status' => 'required',
            'name' => 'required',
        ]);
        $checTrueAns = Answer::where('question_id',$request->question_id)->where('status','true')->get();
        if (count($checTrueAns)==1 && $request->status=='true'){
            return back()->with('error','Only one answer to be correct !');
        }else{
            $answer = new Answer();
            $answer->name = $request->name;
            $answer->question_id = $request->question_id;
            $answer->status = $request->status;
            $answer->save();
            return back()->with('success','Answer saved successfully !');
        }

    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'question_id' => 'required',
            'status' => 'required',
            'name' => 'required',
        ]);
        $checTrueAns = Answer::where('question_id',$request->question_id)->where('id','!=',$id)->where('status','true')->get();
        if (count($checTrueAns)==1 && $request->status=='true'){
            return back()->with('error','Only one answer to be correct !');
        }else{
            $answer = Answer::findOrFail($id);
            $answer->name = $request->name;
            $answer->status = $request->status;
            $answer->save();
            return back()->with('success','Answer update successfully !');
        }

    }
}
