@extends('layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Simple -->
        <h2 class="content-heading">{{$heading}}</h2>
        <div class="row">
        @foreach($categorylevels as $key=>$categorylevel)
                @php
                    $mainKey = ++$key;
                    $totalQuestions = count($categorylevel->questions);
                    $userLevel = \App\UserLevel::where('level_id',$categorylevel->id)->where('user_id',$user->id)->where('category_id',$category->id)->first();
                @endphp
                @if($userLevel)
                    @if($mainKey==1)
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-link-pop @if($userLevel->status=='completed') bg-success @else bg-warning @endif" href="{{url()->current().'/'.$categorylevel->id}}" onclick="return confirm('Are you sure to Start this Level?')">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="fa fa-tags text-white"></i>
                                </div>
                                <div class="ml-3 text-right">
                                    <p class="text-white font-size-h3 font-w300 mb-0">
                                        {{$categorylevel->name}}
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        {{count($category->questions()->where('level_id',$categorylevel->id)->get())}} Questions
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @else
                        @php
                            $prevLevel = $categorylevels[$mainKey-2];
                            $prevLevelQuestions =count($category->questions()->where('level_id',$prevLevel->id)->get());
                            $questionIds = $category->questions()->where('level_id',$prevLevel->id)->select('question_id');
                            $prevLevelResult = count(\App\UserAnswer::whereIn('question_id',$questionIds)->where('user_id',$user->id)->where('status','true')->get());
                        @endphp
                        @if($prevLevelQuestions>0 && $prevLevelResult>0 && $prevLevelQuestions == $prevLevelResult)
                            <div class="col-md-6 col-xl-3">
                                <a class="block block-rounded block-link-pop @if($userLevel->status=='completed') bg-success @else bg-warning @endif" href="{{url()->current().'/'.$categorylevel->id}}" onclick="return confirm('Are you sure to Start this Level?')">
                                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="fa fa-tags text-white"></i>
                                        </div>
                                        <div class="ml-3 text-right">
                                            <p class="text-white font-size-h3 font-w300 mb-0">
                                                {{$categorylevel->name}}
                                            </p>
                                            <p class="text-white-75 mb-0">
                                                {{count($category->questions()->where('level_id',$categorylevel->id)->get())}} Questions
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @else
                            <div class="col-md-6 col-xl-3">
                                <a class="block block-rounded block-link-pop bg-danger" href="javascript:void(0)" onclick="return confirm('You must have completed previous level?')">
                                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="fa fa-tags text-white"></i>
                                        </div>
                                        <div class="ml-3 text-right">
                                            <p class="text-white font-size-h3 font-w300 mb-0">
                                                {{$categorylevel->name}}
                                            </p>
                                            <p class="text-white-75 mb-0">
                                                {{count($category->questions()->where('level_id',$categorylevel->id)->get())}} Questions
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endif
            @endforeach
        </div>
        <!-- END Simple -->

    </div>
    <!-- END Page Content -->


@endsection