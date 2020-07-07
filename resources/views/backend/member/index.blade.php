@extends('backend.member.layouts.master')
@section('content')
    <div class="text-center mt-5">
        <h4>You are logged in</h4>
        <a href="{{url('logout')}}" class="btn btn-danger">Logout Now</a>
    </div>
@endsection