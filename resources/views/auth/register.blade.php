@extends('layouts.app')
@section('body')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <div id="page-container" class="page-header-fixed  page-header-dark main-content-boxed">


        <!-- Main Container -->
        <main id="main-container p-0">

            <!-- Page Content -->
            <div class="bg-image">
                <div class="row no-gutters justify-content-center bg-primary-dark-op">
                    <div class="hero-static col-sm-12 col-md-12 col-xl-8 d-flex align-items-center p-2 px-sm-0">
                        <!-- Sign In Block -->
                        <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                            <div class="block-content block-content-full bg-white">
                                <!-- Header -->
                                <div class="mb-2">
                                    <p class="text-uppercase font-w700 font-size-sm text-muted mt-3 text-center">Register</p>
                                    @if($errors->any())
                                        <hr>
                                        <div role="alert" style="background-color:#d4edda; color:#155724; border-radius: 5px; text-align: left;" class="alert  alert-dismissible show">
                                            @foreach($errors->all() as $error)
                                                <span class="badge badge-danger">Error</span> {{$error}}<br>
                                            @endforeach
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <hr>
                                    @endif

                                </div>
                                <!-- END Header -->

                                <form class="js-validation-signin" action="" method="POST">{{csrf_field()}}
                                    <div class="row">
                                        @include('layouts.notification')
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="text" id="inputIconEx2" name="first_name" value="{{old('first_name')}}" class="form-control" required>
                                                    <label for="inputIconEx2">First Name<span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="text" id="inputIconEx2" name="middle_name" value="{{old('middle_name')}}" class="form-control">
                                                    <label for="inputIconEx2">Middle Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="text" id="inputIconEx2" name="last_name" value="{{old('last_name')}}" class="form-control" required>
                                                    <label for="inputIconEx2">Last Name<span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="text" id="inputIconEx2" name="national_id" value="{{null}}" class="form-control" placeholder="Citizenship/Driving/Loksewa">
                                                    <label for="inputIconEx2">ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="text" id="inputIconEx2" name="mobile" value="{{old('mobile')}}" class="form-control" placeholder="Mobile Number">
                                                    <label for="inputIconEx2">Mobile<span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="text" id="inputIconEx2" name="address" value="{{old('address')}}" class="form-control" placeholder="Your Address">
                                                    <label for="inputIconEx2">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="text" id="inputIconEx2" name="email" class="form-control" required>
                                                    <label for="inputIconEx2">E-mail address<span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="password" id="inputIconEx1" name="password" class="form-control" required>
                                                    <label for="inputIconEx1">Password<span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="password" id="inputIconEx1" name="password_confirmation" class="form-control" required>
                                                    <label for="inputIconEx1">Password Confirm<span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="">
                                                    <label for="inputIconEx1">Gender<span class="text-danger">*</span></label>
                                                    <select name="gender" id="" class="form-control">
                                                        <option value="">--Choose Gender--</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-fw fa-user-plus mr-1"></i> Register
                                        </button>
                                        <a href="{{url('')}}" class="btn btn-hero-warning">
                                            <i class="fa fa-fw fa-home mr-1"></i> Back
                                        </a>
                                    </div>
                                </form>
                                <hr>

                                <!-- END Sign In Form -->
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

    </div>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
@endsection