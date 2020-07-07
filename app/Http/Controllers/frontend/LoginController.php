<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin (){
        $title = 'Login - Quiz App';
        return view('auth.login',compact('title'));
    }
    public function postLogin(){

        $this->validate(request(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        $field = filter_var(request('email'),FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if (Auth::attempt([$field => request('email'), 'password' => request('password')])) {
            if (Auth::check()) {
                if (Auth::user()->type == 'admin') {
                    return redirect('admin');
                }
                if (Auth::user()->type == 'member') {
                    return redirect('member');
                }
            }
        }
        return redirect()->back()->withErrors(['email'=>'Invalid Email/Username','password'=>'Wrong Password'])->withInput(request()->only('email'));
    }

}
