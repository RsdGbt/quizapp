@extends('layouts.app')
@section('body')
    <div id="page-container" class="page-header-fixed  page-header-dark main-content-boxed">

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <a class="link-fx font-size-lg text-white p-2" href="{{url('')}}">
                        <img src="{{asset('property/logo.png')}}" alt="Quiz App" style="width: 200px;">
                        {{--<span class="text-white-75">mero</span><span class="text-white font-w700">talim</span>--}}
                    </a>
                    <!-- END Logo -->

                <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="dropdown d-inline-block">
                            <a href="{{url('login')}}" class="btn btn-outline-success text-white">
                                <i class="fa fa-dashboard text-white"></i>
                                <span class="d-none d-sm-inline ml-1 text-white">Dashboard</span>
                            </a>
                        </div>
                        <div class="dropdown d-inline-block">
                            <a href="{{url('logout')}}" class="btn btn-outline-success text-white">
                                <i class="fa fa-sign-out-alt text-white"></i>
                                <span class="d-none d-sm-inline ml-1 text-white">Logout</span>
                            </a>
                        </div>
                    @else
                        <div class="dropdown d-inline-block">
                            <a href="{{url('login')}}" class="btn btn-outline-success text-white">
                                <i class="fa fa-sign-in-alt text-white"></i>
                                <span class="d-none d-sm-inline ml-1 text-white">Login</span>
                            </a>
                        </div>
                        <div class="dropdown d-inline-block">
                            <a href="{{url('register')}}" class="btn btn-outline-success text-white">
                                <i class="fa fa-user-plus text-white"></i>
                                <span class="d-none d-sm-inline ml-1 text-white">Register</span>
                            </a>
                        </div>
                    @endif
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-white">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-2x fa-sun fa-spin text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">

            <!-- Top Navigation -->
            <div class="bg-white">
                <div class="content py-3">
                    <ul class="nav nav-pills justify-content-center justify-content-md-start">
                        <li class="nav-item mr-1">
                            <a class="nav-link @if(request()->segment('1')=='') active @endif" href="{{url('')}}" title="Home Page">
                                <i class="fa fa-home fa-fw"></i> <span class="d-none d-md-inline ml-1">Home</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Top Navigation -->

            @yield('content')

        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="footer-static bg-dark">
            <div class="content py-4">
                <!-- Footer Navigation -->
                <div class="row items-push font-size-sm border-bottom pt-4">
                    <div class="col-12 text-center">
                        <h3 class="h5 font-w700 text-light">Get in Touch</h3>
                        <h3 class="h5 font-w700 text-light text-center">
                            <img src="{{asset('property/logo.png')}}" alt="Quiz App" style="width: 200px;">
                        </h3>
                        <div class=" text-light">
                            <i class="fa fa-map-marker-alt"></i> Kalanki, Kathmandu, Nepal<br>
                            <a href="#"><span class="text-light"><i class="fa fa-mail-bulk"></i> quizapp@gmail.com </span></a><br>
                            <abbr title="Phone"><i class="fa fa-phone-alt"></i></abbr> 98XXXXXXXX
                        </div>
                    </div>
                </div>
                <!-- END Footer Navigation -->

                <!-- Footer Copyright -->
                <div class="row font-size-sm pt-4">
                    <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right text-primary">
                        Developed <i class="fa fa-heart text-danger"></i> by <a class="font-w600 text-light" href="https://www.facebook.com/gsn.np" target="_blank">Genius Service Nepal Pvt. Ltd.</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                        <a class="font-w600 text-light" href="javascript:void(0)" target="_blank"><span class="text-primary">quiz</span>app</a> <span class="text-primary">&copy; {{date('Y')}}</span>
                    </div>
                    <!-- END Footer Copyright -->
                </div>
        </footer>
        <!-- END Footer -->

    </div>
@endsection