<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('site_name.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontselect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.flipster.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        {{ config('site_name.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('home') }}">Home</a></li>
                            <li><a href="{{ url('search-package') }}">Package</a></li>
                            <li><a href="{{ url('vehicle-list') }}">Vehicle</a></li>
                            <li><a href="{{ url('about') }}">About Us</a></li>
                            <li><a href="{{ url('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                            <li><a href="{{ url('home') }}">Home</a></li>
                            <li><a href="{{ url('search-package') }}">Package</a></li>
                            <li><a href="{{ url('wish-package') }}">Wish Package</a></li>
                            <li><a href="{{ url('vehicle-list') }}">Vehicle</a></li>
                            <!-- <li><a href="{{ url('about') }}">About Us</a></li> -->
                            <li><a href="{{ url('contact') }}">Contact Us</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li style="margin-top:0px !important;">
                                        <a href="{{ url('change-profile') }}">
                                            <i class="fa fa-user"></i>  Change Profile
                                        </a>
                                        <a href="{{ url('change-password') }}">
                                            <i class="fa fa-edit"></i>  Change Password
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>  Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    <div class="margin70">
        @yield('content')
    </div>

    <div id="footer" class="col-md-12 footer no-padding">
        <div class="col-md-4 footer-slide1 no-padding">
            <h3>Get Touch with Us</h3>
            <ul class="footer-address">
                <li>107, Katira commercial complex,</li>
                <li>Ashapura Ring Road,</li>
                <li>Bhuj kutch,</li>
                <li>370001.</li>
            </ul>    
        </div>
        <div class="col-md-4 footer-slide2 no-padding">
            <h3>Important Links</h3>
            <div class="col-md-12 imp-links">
                <ul class="footer-links">
                    <a href="{{ url('home') }}"><li>Home</li></a>
                    <a href="{{ url('review') }}"><li>Reviews</li></a>
                    <a href="{{ url('contact') }}"><li>Contact Us</li></a>
                    <a href="{{ url('termsandcondition') }}"><li>Tearms & Condition</li></a>
                </ul>
            </div>
        </div>
        <div class="col-md-4 footer-slide3 no-padding">
            <h3>Follow us on</h3>
            <div class="col-md-3 col-md-offset-4 social-links social-f">
                <a href="https://www.facebook.com/nexusholidayss/" target="_blank"><i class="fa fa-facebook"></i></a>
            </div>

            <div class="col-md-3 social-links">
                <a href="https://instagram.com/download/?r=6059096042" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>

            <div class="col-md-3 col-md-offset-4 social-links">
                <a target="_blank"><i class="fa fa-whatsapp"></i></a>
            </div>

             <div class="col-md-3 social-links">
                <a href="https://twitter.com/nexustoursntrvl?s=08" target="_blank"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>

    <div class="copyright col-md-12 no-padding">
        <div class="col-md-6">
            <p>&copy; 2017 Copyright {{ config('site_name.name') }}</p>
        </div>

        <div class="col-md-6">
            <a target="_blank" href="http://mearaz-qureshi.business.site">
                <span>Design and developed by<b> mearazqureshi@gmail.com</b></span>
            </a>
        </div>
    </div>

    </div>

    <!-- Scripts -->

</body>
</html>
