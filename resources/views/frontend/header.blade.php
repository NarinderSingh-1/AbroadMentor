<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') - {{ config('app.name', 'AbroadMentor') }}</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/owl.theme.default.min.css') }}" />
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('js/lightbox/magnific-popup.css') }}" />
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/lightbox/jquery.magnific-popup.min.js') }}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.lightbox').magnificPopup({type:'image'});
                $('.gallery-image').each(function(){
                    $(this).magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        gallery: {
                            enabled: true, // set to true to enable gallery
                            preload: [0,2], // read about this option in next Lazy-loading section
                            navigateByImgClick: true,
                            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
                            tPrev: 'Previous', // title for left button
                            tNext: 'Next', // title for right button
                            tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
                        }
                    });
                });
            });
        </script>
    </head>

    <body class="innerpage">
        <!-- Navigation -->
        <div class="navbar-fixed nav_fix">
            <nav class="cus_nav">
                <div class="container">
                    <div class="nav-wrapper">
                        <!-- <a href="/" data-activates="side-menu" class="button-collapse left menu_icon" style="display:block !important;">
                            <img src="{{ asset('images/menu.svg') }}" />
                        </a> -->
                        <a href="/" class="logo"><img src="{{ asset('images/logo.png') }}" /></a>
                        <!-- side bar -->
                        <ul class="side-nav" id="side-menu">
                            <li><img src="{{ asset('images/cancel.svg') }}" /> <a href="#" class="inlogo"><img src="images/logo-black.png" alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('images/magnifying-glass.png') }}" alt="" /> For Institutions</a></li>
                            <li><a href="#"><img src="{{ asset('images/consultant.png') }}" alt="" /> For Consultants</a></li>
                            <li><a href="#"><img src="{{ asset('images/student.png') }}" alt="" /> For Students</a></li>
                            <li><a href="#"><img src="{{ asset('images/open-book.png') }}" alt="" /> Global Access</a></li>
                            <li><a href="#"><img src="{{ asset('images/goverment.png') }}" alt="" /> For Goverment</a></li>
                            <li><a href="#"><img src="{{ asset('images/events.png') }}" alt="" /> Events</a></li>
                        </ul>
                        <!-- side bar -->

                        <!-- Top Right Menu -->
                        <ul id="nav-mobile" class="right hide-on-med-and-down top_menu">
                        <li><a href="{{ url('') }}"><img src="{{ asset('images/home.png') }}" /></a></li>
                            <li><a href="{{ url('/pages/about') }}">About Us</a></li>
                            <li><a href="{{ url('/pages/contact') }}">Contact Us</a></li>
                            <li><a href="{{ url('/pages/help-desk') }}">IT Helpesk</a></li>
                            @if(currentUser())
                                <li><a href="/profile">Profile</a></li>
                                <li><a href="/logout">Logout</a></li>
                            @else
                                <li><a href="/login">Login / Sign Up</a></li>
                            @endif
                        </ul>
                        <!-- Top Right Menu -->
                        @if(app('request')->is('search'))
                        <form class="loc_search listing_head" action="/search" method="get">
                            <div class="input-field loc">
                                <input type="text" name="place" id="locationAutoComplete" class="location" placeholder="Place" value="{{ isset($place) ? $place : '' }}" autocomplete="off" />
                            </div>
                            <div class="input-field search">
                                <input type="text" name="service" id="serviceAutoComplete" class="services" placeholder="Search" value="{{ isset($service) ? $service : '' }}" autocomplete="off" />
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navigation -->