@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12 package-info no-padding">
            <h2>Reset Password</h2>    
        </div>    
                
    <div class="col-md-12 innerLine">
        <div class="col-md-11">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">
                                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control textbox-controll" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-2 control-label">Password</label>

                    <div class="col-md-10">
                        <input id="password" type="password" class="form-control textbox-controll" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>
                    <div class="col-md-10">
                        <input id="password-confirm" type="password" class="form-control textbox-controll" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2 col-md-offset-10">
                        <button type="submit" class="btn btn-primary btn-demo">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
        
    </div>
</div>
@endsection
