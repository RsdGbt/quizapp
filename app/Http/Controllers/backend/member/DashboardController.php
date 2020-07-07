<?php

namespace App\Http\Controllers\backend\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $heading = 'Dashboard';
        $title = $heading.' - '.$user->first_name.' '.$user->last_name.' - Quiz App';
        return view('backend.member.index',compact('title','user','heading'));
    }

}
