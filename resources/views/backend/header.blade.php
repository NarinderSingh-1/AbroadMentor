<!DOCTYPE html>
<html>
    <head>
        <!--CSS-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/backend.css') }}"  media="all"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}"  media="all"/>
        <!--CSS-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <!-- Navigation -->
        <nav class="cus_nav">
            <a href="javascript:void(0);" class="left menu_icon hide-on-large-only"><img src="{{ asset('images/menu-ic.png') }}"></a>
            <a href="/" class="left logo"><img src="{{ asset('images/logo.png') }}" /></a>
            <a class="dropdown-button right topmenu" href="#!" data-activates="dropdown1">
                <span><img src="{{ asset('images/user-ic.png') }}"></span> <div>Nattu User Name</div> 
                <img src="{{ asset('images/drop-ic.png') }}" class="drop_arrow"/>
            </a>
            <ul id='dropdown1' class='dropdown-content topmenu_drop'>
                <li><a href="{{ url('/profile') }}">Profile</a></li>
                <li><a href="{{ url('/logout') }}">Logout</a></li>
            </ul>
        </nav>
        <!-- Navigation -->

        <!-- side bar -->
        <nav class="main-menu side_menu hide-on-med-and-down">
            <ul>
                <li>
                    <a href="#">
                        <img src="{{ asset('images/overview.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="#">
                        <img src="{{ asset('images/mentors.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Insight
                        </span>
                    </a>
                <li>
                    <a href="{{ url('/profile') }}">
                        <img src="{{ asset('images/overview.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Profile
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="{{ url('/mentor')}}">
                        <img src="{{ asset('images/mentors.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Mentors
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="{{ url('/service')}}">
                        <img src="{{ asset('images/services.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Services
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="{{ url('/testimonials')}}">
                        <img src="{{ asset('images/visa.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Testimonials
                        </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('/membership')}}">
                        <img src="{{ asset('images/social.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Membership
                        </span>
                    </a>
                </li>
              
                <li>
                     <a href="{{ url('/event')}}">
                        <img src="{{ asset('images/membership.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Event
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/promote')}}">
                       <img src="{{ asset('images/membership.png') }}" class="side-icon" />
                        <span class="nav-text">
                            Promote
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <img src="{{ asset('images/membership.png') }}" class="side-icon" />
                            <span class="nav-text">
                                    Review list
                            </span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- side bar -->

        <div class="right_container">
