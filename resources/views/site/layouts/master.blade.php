<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>
        @if(!empty($title) )
            {{ $title }} | {{ env('BUSINESS_NAME') }}
        @else
            {{ env('BUSINESS_NAME') }}
        @endif
    </title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="/site/assets/css/responsive.css">       

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/site/assets/images/logo/bimbel.png">
    <link rel="apple-touch-icon-precomposed" href="/site/assets/images/logo/bimbel.png">

    <style>
        .sc-about-2 .inner .title-line::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0 !important;
            width: 5px;
            height: 40px !important;
            background-color: rgb(99, 69, 237);
        }
    </style>

</head>

@if(request()->is('/'))
<body class="counter-scroll header-fixed main">
@else 
<body class="counter-scroll header-fixed inner-page about">
@endif

    <!-- Preloader -->
    <!-- <div id="preload" class="preload">
        <div class="preload-logo"></div>
    </div> -->

    <div id="wrapper">
        <div id="page" class="clearfix">
            @if(request()->is('/'))
                @include('site.layouts.partials.header-1')     
            @else 
                @include('site.layouts.partials.header-2')     
            @endif
            @yield('content')

            @include('site.layouts.partials.footer')
    </div>
    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>

    <!-- Javascript -->
    <script src="/site/assets/js/jquery.min.js"></script>
    <script src="/site/assets/js/plugin.js"></script>
    <script src="/site/assets/js/countto.js"></script>
    <script src="/site/assets/js/jquery-validate.js"></script>
    <script src="/site/assets/js/owl.carousel.min.js"></script>
    <script src="/site/assets/js/owl.carousel2.thumbs.js"></script>
    <script src="/site/assets/js/main.js"></script>
    <script src="/site/assets/js/shortcodes.js"></script>
    <script src="/site/assets/js/wow.min.js"></script>
    <script src="/site/assets/js/jquery.magnific-popup.min.js"></script>
</body>

</html>