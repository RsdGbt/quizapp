<?php

namespace App\Http\Controllers\backend\admin\levels;

use App\Http\Controllers\Controller;
use App\Model\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function index(){
        return redirect('admin/levels/list-level');
    }
    public function getList(){
        $user = Auth::user();
        $heading = 'Levels Manager';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        $levels = Level::orderBy('name')->get();
        return view('backend.admin.level.index',compact('title','user','heading','levels'));
    }
    public function create(){
        $user = Auth::user();
        $heading = 'Add New Level';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        return view('backend.admin.level.create',compact('title','user','heading'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:levels,name',
        ]);
        $level = new Level();
        $level->name = $request->name;
        $level->save();
        return back()->with('success','New Level saved successfully !');
    }

}
