<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nexus Tours and travels</title>
     <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <!-- Fonts -->
    <!--  <link rel="stylesheet" href="{{ url('css/font-awesome.css') }}" > -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">-->

    <!-- Styles -->
   
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
   <!--  <link rel="stylesheet" href="{{ url('assets/css/mystyle.css') }}"> -->
    <link rel="stylesheet" href="{{ url('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ url('css/fontselect.css') }}">
    <link rel="stylesheet" href="{{ url('css/font.css') }}">

    <!-- Custom Theme Style -->
        <link href="{{ url('css/gentelella.min.css') }}" rel="stylesheet">
    <!--end template-->

   

    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
    <link rel="stylesheet" href="{{ url('css/admin_backside.css') }}">
<!--     <link rel="stylesheet" href="{{ url('assets/css/objects.css') }}"> -->
    <link rel="stylesheet" href="{{ url('css/bootstrap-slider.min.css') }}">

    <!-- Scripts -->
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <!-- End Scripts -->

    <style>

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
 <body class="nav-md"  style="background-color:#fff;">
@include('include.sidebar')
@include('include.header')

    <!--Page Content-->
    <div class="right_col" role="main">
        @yield('content')
    </div>
    <!--End Page Content-->

    @include('include.footer')
    
    <div id="overlay" style="display:none;">
        <img id="loading" src="{{ url('images\ajax-loader.gif') }}">
    </div>    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ url('js/custom.min.js') }}"></script>

  </body>
</html>