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
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center">Results</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 7%;">SN</th>
                                            <th style="width: 43%;">Questions</th>
                                            <th style="width: 50%;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($levelQustions as $aKey=>$levelQustion)
                                        <tr>
                                            <td>{{++$aKey}}</td>
                                            <td>{{$levelQustion->name}}</td>
                                            <td>
                                                <div class="row">
                                                    @foreach($levelQustion->answers as $answer)
                                                        @php
                                                            $checkAnswers = \App\UserAnswer::where('user_id',$user->id)->where('question_id',$levelQustion->id)->where('answer_id',$answer->id)->orderBy('id','DESC')->first();
                                                        @endphp
                                                        <div class="col-sm-6 col-md-6">
                                                            <span class="badge @if($answer->status=='true') badge-success @else badge-danger @endif">{{$answer->name}}</span>
                                                            @if($checkAnswers)
                                                                @if($checkAnswers->status=='true' && $answer->status=='true')
                                                                <span class="badge badge-success" title="Right Answer"><i class="fa fa-check-circle"></i></span>
                                                                @else
                                                                    <span class="badge badge-danger" title="Wrong Answer"><i class="fa fa-times-circle"></i></span>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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