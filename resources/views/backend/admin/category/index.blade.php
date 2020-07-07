@extends('backend.admin.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        @include('layouts.notification')
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="fa fa-tags"></i> {{$heading}}
                    <a href="{{url('admin/categories/add-category')}}" class="btn btn-primary " style="float: right;"><i class="fa fa-plus-circle"></i> Add Category</a>
                </h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Added</th>
                            <th>Updated</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td class="font-w600">
                                        <a href="#">{{$category->name}}</a>
                                    </td>
                                    <td>
                                        @if($category->status=='public')
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-warning">Drafted</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{date('F m, Y',strtotime($category->created_at))}}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{$category->updated_at->diffForHumans()}}</span>
                                    </td>
                                    <td>

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