@extends('layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Simple -->
        <h2 class="content-heading">{{$heading}}</h2>
        <div class="row">
            <div class="col-sm-8">
                @foreach($questions as $key=>$question)
                    <h2 class="content-heading text-center">{{$question->name}}</h2>
                    <hr>
                    <form action="" method="post">{{csrf_field()}}
                        <div class="row">
                            @foreach($question->answers as $answer)
                                <div class="col-sm-6 mb-5">
                                    <div class="custom-control custom-block custom-control-success">
                                        <input type="radio" class="custom-control-input" id="example-cb-custom-block{{$answer->id}}" name="answer[]" value="{{$answer->id}}" onchange="javascript:this.form.submit();" onclick="return confirm('Are you sure to confirm this Answer?')">
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
            </div>
        </div>
        <!-- END Simple -->

    </div>
    <!-- END Page Content -->


@endsection