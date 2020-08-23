@extends('layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Simple -->
        <h2 class="content-heading">{{$heading}}</h2>
        <div class="row">
            @include('layouts.notification')
            <div class="col-sm-8">
                @if(count($questions)>0)
                    @foreach($questions as $key=>$question)
                        @php
                            $mainKey = $key;
                        @endphp
                        <h2 class="content-heading text-center">({{$mainKey + $questions->firstItem()}}) {{$question->name}}</h2>
                        <hr>
                        <form action="" method="post">{{csrf_field()}}
                            <div class="row">
                                @foreach($question->answers as $answer)
                                    <div class="col-sm-6 mb-5">
                                        <div class="custom-control custom-block custom-control-success">
                                            <input type="hidden" name="question_id" value="{{$question->id}}">
                                            <input type="radio" class="custom-control-input" id="example-cb-custom-block{{$answer->id}}" name="answer" value="{{$answer->id}}" onchange="javascript:this.form.submit();" onclick="return confirm('Are you sure to confirm this Answer?')">
                                            <label class="custom-control-label" for="example-cb-custom-block{{$answer->id}}">
                                            <span class="d-block text-center">
                                                <i class="fa fa-check fa-2x mb-2 text-black-50"></i><br>
                                                {{$answer->name}}
                                            </span>
                                            </label>
                                            <span class="custom-block-indicator">
                                            <i class="fa fa-check"></i>
                                        </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    @endforeach
                @else
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="table-responsive mt-3">
                                <table class="table table-sm table-vcenter table-bordered">
                                    <thead>
                                    <tr>
                                        <th colspan="3">View Submitted Record</th>
                                    </tr>
                                    <tr>
                                        <th>SN</th>
                                        <th class="text-left">Question</th>
                                        <th class="text-left">Your Answer</th>
                                        <th class="text-left">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $marks = 0;
                                        $negMarks = 0;
                                    @endphp
                                    @foreach($levelQustions as $key=>$levelQustion)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td class="text-left">
                                                {{$levelQustion->name}}
                                            </td>
                                            <td class="text-left">
                                                    @php
                                                        $questionOptions = \App\Answer::where('question_id',$levelQustion->id)->get();
                                                    @endphp
                                                @foreach($questionOptions as $questionOption)
                                                    @if($userAnswer = \App\UserAnswer::where('user_id',$user->id)->where('answer_id',$questionOption->id)->first())
                                                        {{$questionOption->name}}
                                                        @if($questionOption->status=='true')
                                                            @php
                                                                $marks += $levelQustion->marks;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $negMarks += $levelQustion->neg_marks;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-left">
                                                @php
                                                    $questionOptions = \App\Answer::where('question_id',$levelQustion->id)->get();
                                                @endphp
                                                @foreach($questionOptions as $questionOption)
                                                    @if($userAnswer = \App\UserAnswer::where('user_id',$user->id)->where('answer_id',$questionOption->id)->first())
                                                        @if($questionOption->status=='true')
                                                            <span class="badge badge-light badge-pill">Wrong Answer</span>
                                                            <span class="badge badge-success badge-pill">+{{$levelQustion->marks}} Point Added</span>
                                                        @else
                                                            <span class="badge badge-light badge-pill">Wrong Answer</span>
                                                            <span class="badge badge-danger badge-pill">-{{$levelQustion->neg_marks}} Point Deducted</span>
                                                        @endif
                                                    @endif
                                                @endforeach

                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="3">
                                            <span class="badge badge-success font-weight-bold">Your Total Mask : <span class="badge badge-light badge-pill">{{$marks-$negMarks}}</span></span>
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                                <a href="{{url(''.'/'.$slug)}}" class="badge badge-success font-weight-bold font-size-h4"> Play Next Level</a>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if(count($questions)>0)
            <div class="col-sm-8 mb-5 text-center">
                @if(request('page'))
                    @if(request('page')=='1')
                        <button disabled class="btn btn-warning"><i class="fa fa-backward"></i> Previous Question</button>
                    @else
                    <a href="{{$questions->previousPageUrl()}}" class="btn btn-warning"><i class="fa fa-backward"></i> Previous Question</a>
                    @endif
                @else
                    <button disabled class="btn btn-warning"><i class="fa fa-backward"></i> Previous Question</button>
                @endif
                <button disabled="" class="btn btn-success"><i class="fa fa-forward"></i> Next Question</button>
            </div>
            @endif
        </div>
        <!-- END Simple -->

    </div>
    <!-- END Page Content -->


@endsection