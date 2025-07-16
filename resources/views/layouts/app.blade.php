@php
    $whitelist = ['127.0.0.1', '::1'];
@endphp

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>@yield('title') - {{ Session::get('business.name') }}</title>--}}

    @include('layouts.partials.css')

    @yield('css')
</head>

<body>
<!-- End of currency related field-->

    <div class="container">
        <script type="text/javascript">
            if(localStorage.getItem("upos_sidebar_collapse") == 'true'){
                var body = document.getElementsByTagName("body")[0];
                body.className += " sidebar-collapse";
            }
        </script>

        @include('layouts.partials.sidebar')


        @if(in_array($_SERVER['REMOTE_ADDR'], $whitelist))
            <input type="hidden" id="__is_localhost" value="true">
        @endif

        <!-- Content Wrapper. Contains page content -->

        <main>
            @include('layouts.partials.header')
            <!-- empty div for vuejs -->
            <div id="app">
                @yield('vue')
            </div>
            @if (session('status'))
                <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
            @endif
            @yield('content')

            <div class='scrolltop no-print'>
                <div class='scroll icon'><i class="fas fa-angle-up"></i></div>
            </div>



            <!-- This will be printed -->
            <section class="invoice print_section" id="receipt_section">
            </section>

        </main>

        <!-- /.content-wrapper -->

    </div>
@include('layouts.partials.javascripts')


<div class="modal fade view_modal" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel"></div>


</body>

</html>
