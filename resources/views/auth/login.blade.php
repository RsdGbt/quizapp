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
                    <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                        <!-- Sign In Block -->
                        <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                            <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                                <!-- Header -->
                                <div class="mb-2 text-center">
                                    <a class="font-w700 font-size-h1" href="{{url('')}}">
                                        <img src="{{asset('property/logo.png')}}" class="img-fluid" alt="" style="width: 40%;">
                                        {{--<span class="text-dark">Hotel</span><span class="text-primary">Shankharapur</span><i></i>--}}
                                    </a>
                                    <p class="text-uppercase font-w700 font-size-sm text-muted mt-3">Sign In</p>
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

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signin" action="" method="POST">{{csrf_field()}}
                                    <div class="form-group">
                                        <div class="md-form">
                                            <i class="fas fa-user prefix"></i>
                                            <input type="text" id="inputIconEx2" name="email" class="form-control">
                                            <label for="inputIconEx2">E-mail address</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="md-form">
                                            <i class="fas fa-lock prefix"></i>
                                            <input type="password" id="inputIconEx1" name="password" class="form-control">
                                            <label for="inputIconEx1">Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-left">
                                        <div class="custom-control custom-checkbox custom-control-primary">
                                            <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me" checked>
                                            <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                                        </div>
                                        <div class="font-w600 font-size-sm py-1">
                                            <a href="javascript:void(0)">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
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