@extends('backend.admin.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        @include('layouts.notification')
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="fa fa-tags"></i> {{$heading}}
                </h3>
            </div>
            <div class="block-content">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <div class="row">
                                        <div  style="width: 50%; margin: 0 auto;">
                                            <table>
                                                <tr class="text-center">
                                                    <th class="text-center">
                                                        <div class="text-center mb-2 p2 bg-white">
                                                            <img class="img-avatar img-avatar-thumb bg-white" id="photoDisplay" src="{{asset('uploads/users/photos'.'/'.$user->photo)}}" alt="">
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            Choose Photo
                                                        </span>
                                                            </div>
                                                            <input type="file" onchange="photoURL(this);" class="form-control" id="example-group1-input1" name="photo">
                                                        </div>

                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Middle Name</label>
                                    <input type="text" name="middle_name" value="{{$user->middle_name}}" class="form-control">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">ID</label>
                                    <input type="text" name="national_id" value="{{$user->national_id}}" class="form-control" placeholder="Citizenship/Driving/Loksewa">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" value="{{$user->address}}" class="form-control">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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
    <script>
        function photoURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photoDisplay')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection