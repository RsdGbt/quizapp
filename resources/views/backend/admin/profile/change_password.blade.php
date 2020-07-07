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
                                <div class="col-sm-4 form-group">
                                    <label for="">New Password <span class="text-danger">*</span></label>
                                    <input type="text" name="password" value="{{null}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
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