<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function create(){
        $title = 'Register - Quiz App';
        return view('auth.register',compact('title'));
    }
    public function store(Request $request){
        $this->validate($request,[
           'email' =>'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
        ]);
        /* ================== Creating User ============= */
        $totalMember = User::where('type','member')->count();
        $randomNumeric = $totalMember+rand(1,100);
        $username = Str::lower($request->first_name).'-'.$randomNumeric;
        $user = new User();
        $user->name = $username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->national_id = $request->national_id;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->type = 'member';
        $user->status = '1';
        $user->save();
        $field = filter_var(request('email'),FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if (Auth::attempt([$field => request('email'), 'password' => request('password')])) {
            if (Auth::check()) {
                return redirect(\request('redirectRoute'))->with('success','You are Logged In !');
            }
        }
        return back()->with('success','Congratulations you are registered successfully !');
    }
}
