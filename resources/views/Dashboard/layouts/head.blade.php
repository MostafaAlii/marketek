<!-- Title -->
<title>@yield('title')</title>
@yield('css')
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/Dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/Dashboard/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/Dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/Dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
@if (App::getLocale()=='ar')
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('assets/Dashboard/css-rtl/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{URL::asset('assets/Dashboard/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('assets/Dashboard/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('assets/Dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">
@else
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('assets/Dashboard/css/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{URL::asset('assets/Dashboard/css/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('assets/Dashboard/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('assets/Dashboard/css/skin-modes.css')}}" rel="stylesheet">
@endif