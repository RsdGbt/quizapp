@extends('backend.admin.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        @include('layouts.notification')
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="fa fa-tags"></i> {{$heading}}
                    <a href="{{url('admin/questions/add-question')}}" class="btn btn-primary " style="float: right;"><i class="fa fa-plus-circle"></i> Add Question</a>
                </h3>
            </div>
            <div class="block-content">
                <div class="border p-2 bg-white mb-2">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Filter Questions <i class="fa fa-search"></i></label>
                                        @if(request('order') || request('per_page') || request('name'))
                                            <br>
                                            <a href="{{url()->current()}}" class="badge badge-light"><i class="fa fa-times-circle"></i> Clear Search</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Question</span>
                                    </div>
                                    <input type="text" name="name" value="{{request('name')}}" class="form-control" onchange="javascript:this.form.submit();">
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                                    </div>
                                    <select name="category_id" id="category_id" class="form-control" onchange="javascript:this.form.submit();">
                                        <option value="">--Choose--</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if(request('category_id')==$category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Level</span>
                                    </div>
                                    <select name="level_id" id="level_id" class="form-control" onchange="javascript:this.form.submit();">
                                        <option value="">--Choose--</option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}" @if(request('level_id')==$level->id) selected @endif>{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <div class="input-group mb-3">
                                    <select name="order" id="" class="form-control" onchange="javascript:this.form.submit();">
                                        <option value="DESC" @if(request('order')=='DESC') selected @endif>Newest</option>
                                        <option value="ASC" @if(request('order')=='ASC') selected @endif>Oldest</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center">SN</th>
                            <th>Question</th>
                            <th>Answers</th>
                            <th class="text-center">Categories</th>
                            <th class="text-center">Levels</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $key=>$question)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$question->name}}</td>
                                    <td>
                                        <a href="{{url('admin/answers/list-answers?question_id='.$question->id)}}" class="border-bottom pb-1 mb-1"><span class="badge badge-info">Insert Option</span></a><br>
                                        @foreach($question->answers as $answer)
                                            @if($answer->status=='true')
                                                <span class="badge badge-success">{{$answer->name}} : <span class="badge badge-light">{{$answer->status}}</span></span>
                                            @else
                                                <span class="badge badge-danger">{{$answer->name}} :</span> <span class="badge badge-light">{{$answer->status}}</span>
                                            @endif
                                            <br>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($question->category as $category)
                                            <span class="badge badge-dark">{{$category->name}}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-warning">{{$question->level->name}}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($question->status=='public')
                                        <span class="badge badge-success">{{$question->status}}</span>
                                        @else
                                        <span class="badge badge-warning">draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url()->current().'/'.$question->id.'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        <tr>
                            <th colspan="7">
                                {{$questions->withQueryString()->links()}}
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->

@endsection
@section('style')
@endsection

@section('script')
@endsection