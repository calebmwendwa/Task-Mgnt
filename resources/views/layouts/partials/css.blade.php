<link rel="stylesheet" href="{{ asset('css/vendor.css') }}">

<link rel="stylesheet" href="{{ asset('css/style.css') }}">



@yield('css')

<!-- app css -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/override.css') }}">
<link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
{{--<link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}


<style type="text/css">
    /*
    * Pattern lock css
    * Pattern direction
    * http://ignitersworld.com/lab/patternLock.html
    */
    .patt-wrap {
        z-index: 10;
    }
    .patt-circ.hovered {
        background-color: #cde2f2;
        border: none;
    }
    .patt-circ.hovered .patt-dots {
        display: none;
    }
    .patt-circ.dir {
        background-image: url("{{asset('/img/pattern-directionicon-arrow.png')}}");
        background-position: center;
        background-repeat: no-repeat;
    }
    .patt-circ.e {
        -webkit-transform: rotate(0);
        transform: rotate(0);
    }
    .patt-circ.s-e {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .patt-circ.s {
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .patt-circ.s-w {
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg);
    }
    .patt-circ.w {
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .patt-circ.n-w {
        -webkit-transform: rotate(225deg);
        transform: rotate(225deg);
    }
    .patt-circ.n {
        -webkit-transform: rotate(270deg);
        transform: rotate(270deg);
    }
    .patt-circ.n-e {
        -webkit-transform: rotate(315deg);
        transform: rotate(315deg);
    }
</style>
