@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 login-page">
            <h1 class="panel-heading">Log In</h1>
            <h3 class="panel-heading2">New User ? <a href="{{ route('register') }}">Sign Up</a></h3>

        </div>

        <div class="col-md-12">
                 @if(Session::has('flash_message'))
                    <div class="alert alert-danger">
                         <span class="glyphicon glyphicon-close"></span>
                            <em> {!! session('flash_message') !!}</em>
                    </div>
                @endif
        </div>

        <div class="col-md-12">
            <div class="col-md-4 col-md-offset-1">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                   <!--  <label class="panel-label">Email</label> -->
                    <input id="email" type="email" value="{{ old('email') }}" class="panel-textbox" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <!--  <label class="panel-label">Email</label> -->
                    <input id="password" type="password" value="{{ old('password') }}" class="panel-textbox" placeholder="Password" name="password" value="{{ old('password') }}" required autofocus>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <div class="col-md-12">
                        <div class="col-md-6 no-padding">
                            <input type="checkbox" class="checkbox"> <label class="remember-me">Remember Me</label> 
                        </div>

                        <div class="col-md-6 no-padding right forget-password">
                            <a href="{{ url('forget-password') }}" class="col-md-12 no-padding"> Forget your password ? </a>
                        </div> 
                    </div>         

                    <div class="col-md-12 no-padding right">
                        <button type="submit" class="btn btn-primary btn-blog">Log In</button>  
                    </div>
                </form>

            </div>

           <div class="divider"></div>

            <div class="col-md-4 col-md-offset-1 social-panel">

                <div class="icon-and-text">
                    <div class="icon blue-background">
                        <i class="fa fa-facebook"></i>
                    </div>
                    <div class="btn btn-primary btn-social blue">Continue with Facebook</div>
                </div>

                <div class="icon-and-text">
                    <div class="icon red-background">
                        <i class="fa fa-google-plus"></i>
                    </div>
                    <div class="btn btn-primary btn-social red red-border">Continue with Google</div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
