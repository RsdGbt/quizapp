@extends('backend.admin.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        @include('layouts.notification')
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="fa fa-tags"></i> {{$heading}}
                    <button class="btn btn-primary " style="float: right;" data-toggle="modal" data-target="#addAnswer"><i class="fa fa-plus-circle"></i> Add Answer</button>
                </h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center">SN</th>
                            <th>Answers</th>
                            <th>Question</th>
                            <th class="text-center">Result</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($answers as $key=>$answer)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td>{{$answer->name}}</td>
                                    <td>{{$answer->question->name}}</td>
                                    <td class="text-center">
                                        @if($answer->status=='true')
                                            <span class="badge badge-success">{{$answer->status}}</span>
                                        @else
                                            <span class="badge badge-danger">{{$answer->status}}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAnswer{{$answer->id}}"><i class="fa fa-edit"></i> Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
    <div class="modal fade" id="addAnswer" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add Answer</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Add Answer on {{$question->name}}</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url()->current()}}" method="POST">{{csrf_field()}}
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Answer<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-group1-input1" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                                Result<span class="text-danger">*</span>:<br>
                                                <input type="radio" name="status" value="true" required> True
                                                <input type="radio" name="status" value="false" required> False
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mb-0">
                                    <button type="submit" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-plus-circle mr-1"></i> Add Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @foreach($answers as $key=>$answerEdit)
    <div class="modal fade" id="editAnswer{{$answerEdit->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit Answer</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">

                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full bg-white">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Edit Answer on {{$question->name}}</p>
                            </div>
                            <!-- END Header -->

                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{url()->current().'/'.$answerEdit->id.'/update'}}" method="POST">{{csrf_field()}}
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Answer<span class="text-danger">*</span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$answerEdit->name}}" id="example-group1-input1" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                                Result<span class="text-danger">*</span>:<br>
                                                <input type="radio" name="status" value="true" @if($answerEdit->status=='true') checked @endif required> True
                                                <input type="radio" name="status" value="false" @if($answerEdit->status=='false') checked @endif required> False
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mb-0">
                                    <button type="submit" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-plus-circle mr-1"></i> Update Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
@section('style')
@endsection

@section('script')
@endsection