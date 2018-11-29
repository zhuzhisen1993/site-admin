<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="{{URL::asset('css/base.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/index.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/about.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/learn.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/share.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/msh.css')}}" rel="stylesheet">
<!--[if lt IE 9]>
    {{--<script src="js/modernizr.js"></script>--}}
{{--<![endif]-->--}}
{{--<script src="{{URL::asset('js/scrollReveal.js')}}"></script>--}}
{{--<script src="{{URL::asset('js/vue2.1.6.js')}}"></script>--}}
{{--<script src="{{URL::asset('js/jquery-1.10.2.min.js')}}"></script>--}}
        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<div id="app">
    <app></app>
</div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
</html>
