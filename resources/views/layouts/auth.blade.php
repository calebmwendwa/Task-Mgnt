<!DOCTYPE html>
{{--<html lang="{{ app()->getLocale() }}">--}}
<html>
<head>
    <script type="text/javascript" src="https://cdn.ywxi.net/js/2.js" async></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
{{--    <title>@yield('title') - {{ config('app.name', 'POS') }}</title>--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
{{--    @include('layouts.partials.css')--}}

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        /*CM06072023 removed background color for pricing page*/
        /*body {*/
        /*    background-color: #243949;*/
        /*}*/
        h1 {
            color: #27aae1;
        }


    </style>
</head>

<body>
@if (session('status'))
    <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
@endif



<div class="login-layout">
    <div class="form-content justify-content-center">
        @yield('content')
    </div>
</div>


</body>
{{--@include('layouts.partials.javascripts')--}}
<!-- Scripts -->
{{--<script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>--}}
@yield('javascript')

<script type="text/javascript">
    $(document).ready(function(){
        $('.select2_register').select2();

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

</html>
