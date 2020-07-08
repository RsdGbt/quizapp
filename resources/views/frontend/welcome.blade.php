@extends('layouts.master')
@section('content')

    <!-- Page Content -->
    <div class="content">
        <!-- Simple -->
        <h2 class="content-heading">Popular Categories</h2>
        <div class="row">
            @include('layouts.notification')
            @foreach($categories as $category)
                @if(\Illuminate\Support\Facades\Auth::check())
                    @php
                        $linkarea = null;
                        $link = url(''.'/'.$category->slug);
                    @endphp
                @else
                    @php
                        $linkarea ='data-toggle="modal" data-target="#logInAction"';
                        $link = 'javascript:void(0)';
                    @endphp
                @endif
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-link-pop bg-success" href="{{$link}}" @if(isset($linkarea)) data-toggle="modal" data-target="#logInAction" @endif>
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fa fa-tags text-white"></i>
                            </div>
                            <div class="ml-3 text-right">
                                <p class="text-white font-size-h3 font-w300 mb-0">
                                    {{$category->name}}
                                </p>
                                <p class="text-white-75 mb-0">
                                    +{{count($category->users)}} Users Played
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- END Simple -->

    </div>
    <!-- END Page Content -->


@endsection