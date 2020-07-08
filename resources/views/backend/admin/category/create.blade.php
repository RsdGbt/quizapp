@extends('backend.admin.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        @include('layouts.notification')
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="fa fa-tags"></i> {{$heading}}
                    <a href="{{url('admin/categories/list-category')}}" class="btn btn-primary " style="float: right;"><i class="fa fa-list-alt"></i> Category List</a>
                </h3>
            </div>
            <div class="block-content">
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required placeholder="Type New Category Name">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="">Level <span class="text-danger">*</span></label>
                                    <select name="level_id[]" multiple id="level_id" class="js-select2 form-control" required>
                                        <option value="">--Choose--</option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                    </select>
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