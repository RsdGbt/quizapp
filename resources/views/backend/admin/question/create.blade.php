@extends('backend.admin.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        @include('layouts.notification')
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="fa fa-tags"></i> {{$heading}}
                    <a href="{{url('admin/questions/list-question')}}" class="btn btn-primary " style="float: right;"><i class="fa fa-list-alt"></i> Question List</a>
                </h3>
            </div>
            <div class="block-content">
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="">New Question <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" required placeholder="Type New Level Name">
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="">Choose Categories <span class="text-danger">*</span></label>
                                    <select name="category_id[]" multiple id="category_id" class="js-select2 form-control" required>
                                        <option value="">--Choose--</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Choose Level <span class="text-danger">*</span></label>
                                    <select name="level_id" id="level_id" class="js-select2 form-control" required>
                                        <option value="">--Choose--</option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}" @if(old('level_id')==$level->id) selected @endif>{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Marks <span class="text-danger">*</span></label>
                                    <input type="number" name="marks" class="form-control" value="{{old('marks')}}" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Negative Marks</label>
                                    <input type="number" name="neg_marks" class="form-control" value="{{old('neg_marks')}}" placeholder="Left Blank for Non-Negative Marks">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
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