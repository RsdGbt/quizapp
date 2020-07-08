@extends('layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Simple -->
        <h2 class="content-heading">{{$heading}}</h2>
        <div class="row">
            @foreach($levels as $key=>$level)
                @php
                    $totalQuestions = count($level->questions);
                    $userLevel = \App\UserLevel::where('level_id',$level->id)->where('user_id',$user->id)->where('category_id',$category->id)->first();
                    $userCategory = \App\Model\CategoryUser::where('user_id',$user->id)->where('category_id',$category->id)->first();
                @endphp
                @if($userLevel)
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-link-pop @if($userLevel->status=='pending') bg-warning @else bg-success @endif" href="{{url()->current().'/'.$level->id}}" onclick="return confirm('Are you sure to Start this Level?')">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="fa fa-tags text-white"></i>
                                </div>
                                <div class="ml-3 text-right">
                                    <p class="text-white font-size-h3 font-w300 mb-0">
                                        {{$level->name}}
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        {{count($level->questions)}} Questions
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @elseif(!($userLevel) && $userCategory)
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-link-pop bg-success" href="{{url()->current().'/'.$level->id}}" onclick="return confirm('Are you sure to Start this Level?')">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="fa fa-tags text-white"></i>
                                </div>
                                <div class="ml-3 text-right">
                                    <p class="text-white font-size-h3 font-w300 mb-0">
                                        {{$level->name}}
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        {{count($level->questions)}} Questions
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @else
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-link-pop bg-danger" href="javascript:void(0)">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="fa fa-tags text-white"></i>
                                </div>
                                <div class="ml-3 text-right">
                                    <p class="text-white font-size-h3 font-w300 mb-0">
                                        {{$level->name}}
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        {{count($level->questions)}} Questions
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- END Simple -->

    </div>
    <!-- END Page Content -->


@endsection