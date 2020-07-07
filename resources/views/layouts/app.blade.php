<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    @if(isset($title))
        <title>{{$title}}</title>
        <meta property="og:title" content="{{$title}}">
    @else
        <title>Quiz App</title>
        <meta property="og:title" content="Quiz App">
    @endif
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($description))
        <meta name="description" content="{{$description}} | Quiz App"/>
    @else
        <meta property='og:description' content='Quiz App'/>
    @endif
    @if(isset($image))
        <meta property='og:image' content='{{url($image)}}'/>
    @else
        <meta property='og:image' content='{{asset('property/banner.png')}}'/>
    @endif
    @if(isset($tag))
        <meta name="keywords" content="{{$tag}} | Quiz App | @if(isset($title)) {{$title}} |  @else Quiz App @endif"/>
    @else
        <meta name="keywords" content="Quiz App"/>
    @endif
    @if(isset($author))
        <meta name="author" content="{{$author}}"/>
    @else
        <meta name="author" content="Quiz App"/>
    @endif
    <meta property='og:url' content='{{url()->current()}}'>
    <meta property="og:type" content="website"/>
    <link rel="shortcut icon" href="{{asset('property/favicon.png')}}">

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/select2/css/select2.min.css">
@yield('style')
<!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/slick-carousel/slick.css">
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/slick-carousel/slick-theme.css">
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/flatpickr/flatpickr.min.css">

    <link rel="stylesheet" id="css-main" href="{{asset('')}}assets/css/dashmix.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/themes/xsmooth.min.css">
    <script src="https://kit.fontawesome.com/f9dfcdd6a8.js" crossorigin="anonymous"></script>

</head>
<body>

@yield('body')


<script src="{{asset('')}}assets/js/dashmix.core.min.js"></script>

<!--
    Dashmix JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at {{asset('')}}assets/_es6/main/app.js
-->
<script src="{{asset('')}}assets/js/dashmix.app.min.js"></script>
<script>
    Laravel = {
        'url': '{{url("")}}'
    };
    var token = '{{ \Illuminate\Support\Facades\Session::token() }}';
</script>
@yield('script')
<!-- Page JS Plugins -->
<script src="{{asset('')}}assets/js/plugins/slick-carousel/slick.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/flatpickr/flatpickr.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/select2/js/select2.full.min.js"></script>

<script>jQuery(function(){ Dashmix.helpers(['slick','flatpickr','select2']); });</script>


</body>
</html>
