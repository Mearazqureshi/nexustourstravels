@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <!--  <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 login-page">
            <h1 class="panel-heading">Sign Up</h1>
            <h3 class="panel-heading2">Already have an account ? <a href="{{ route('login') }}">Log In</a></h3>

        </div>

        <div class="col-md-12">
            <div class="col-md-4 col-md-offset-1">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                    <!--  <label class="panel-label">Email</label> -->
                    <input id="name" type="text" class="panel-textbox" placeholder="Full Name" name="name" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                    <!--  <label class="panel-label">Email</label> -->
                    <input id="contact_no" type="text" class="panel-textbox" placeholder="Phone Number" name="contact_no" value="{{ old('phone') }}" required autofocus>

                    @if ($errors->has('contact_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_no') }}</strong>
                        </span>
                    @endif

                   <!--  <label class="panel-label">Email</label> -->
                    <input id="email" type="email" class="panel-textbox" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                     <!--  <label class="panel-label">Email</label> -->
                    <input id="password" type="password" class="panel-textbox" placeholder="Password" name="password" value="{{ old('password') }}" required autofocus>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <!--  <label class="panel-label">Email</label> -->
                    <input id="password_confirmation" type="password" class="panel-textbox" placeholder="Re-type password" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif         

                    <div class="col-md-12 no-padding right">
                        <button type="submit" class="btn btn-primary btn-blog">Sign Up</button>  
                    </div>
                </form>

            </div>

           <div class="divider signup-divider"></div>

            <div class="col-md-4 col-md-offset-1 social-panel social-panel-signup">

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

        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-4 col-xs-12 signup-condition">
                <p>* By signing up, you agree to our <a href="{{ url('termsandcondition') }}">Terms of Use.</a> </p>
        </div>

    </div>
</div>

@endsection
