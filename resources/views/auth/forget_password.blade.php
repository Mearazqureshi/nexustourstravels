@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="margin70"></div>
        
        <div class="col-md-12">
                 @if(Session::has('success_msg'))
                    <div class="alert alert-success">
                         <span class="glyphicon glyphicon-right"></span>
                            <em> {!! session('success_msg') !!}</em>
                    </div>
                @endif
        </div>


        <div class="col-md-12 package-info h2-heading">
            <h2>Forget Password</h2>    
        </div>

        <div class="col--md-12 innerLine">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-2">E-Mail Address</label>

                    <div class="col-md-9">
                        <input id="email" type="text" class="form-control textbox-controll" name="email" value="{{ old('email') }}" >

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 col-md-offset-8">
                        <button type="submit" class="btn btn-primary btn-demo">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
