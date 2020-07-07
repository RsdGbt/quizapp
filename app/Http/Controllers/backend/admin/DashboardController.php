<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $heading = 'Dashboard';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        return view('backend.admin.index',compact('title','user','heading'));
    }
    public function edit(){
        $user = Auth::user();
        $heading = 'Edit Profile';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        return view('backend.admin.profile.edit',compact('title','user','heading'));
    }
    public function update(Request $request){
        $user = Auth::user();
        $this->validate($request,[
           'first_name' => 'required',
           'last_name' => 'required',
           'mobile' => 'required',
        ]);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->national_id = $request->national_id;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->address = $request->address;
        if ($request->hasFile('photo')){
            if (is_file(public_path('uploads/users/photos'.'/'.$user->photo)) && file_exists(public_path('uploads/users/photos'.'/'.$user->photo))){
                unlink(public_path('uploads/users/photos'.'/'.$user->photo));
            }
            $filename = $user->name.'-'.request()->file('photo')->getClientOriginalName();

            request()->file('photo')->move('public/uploads/users/photos'.'/',$filename);
            $user->photo =$filename;
        }
        $user->save();
        return back()->with('success','Profile updated successfully !');
    }
    public function changePassword(){
        $user = Auth::user();
        $heading = 'Change Password';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        return view('backend.admin.profile.change_password',compact('title','user','heading'));
    }
    public function updatePassword(Request $request){
        $user = User::find(Auth::user()->id);
        $this->validate($request,[
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'required',
        ]);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('success','Password & Email updated successfully');
    }

}
