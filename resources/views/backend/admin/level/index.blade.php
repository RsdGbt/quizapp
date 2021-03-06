@extends('backend.admin.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        @include('layouts.notification')
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="fa fa-tags"></i> {{$heading}}
                    <a href="{{url('admin/levels/add-level')}}" class="btn btn-primary " style="float: right;"><i class="fa fa-plus-circle"></i> Add Level</a>
                </h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center">SN</th>
                            <th>Name</th>
                            <th class="text-center">Added</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($levels as $key=>$level)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="font-w600">
                                        <a href="#">{{$level->name}}</a>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-light">{{date('F m, Y',strtotime($level->created_at))}}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-light">{{$level->updated_at->diffForHumans()}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url()->current().'/'.$level->id.'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
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

@endsection
@section('style')
@endsection

@section('script')
@endsection