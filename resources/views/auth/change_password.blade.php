@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12 package-info h2-heading">
            <h2>Change Password</h2>    
        </div>

        <div class="col-md-12">
             @if(Session::has('success_msg'))
                    <div class="alert alert-success">
                         <span class="glyphicon glyphicon-ok"></span>
                            <em> {!! session('success_msg') !!}</em>
                    </div>
             @endif
        </div>

        <div class="col-md-12 innerLine">
                
            <div class="col-md-11">
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('change-password') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('password') ? ' ' : '' }}">
                        <div class="col-md-2 col-sm-3">
                            <label for="name" class="form-textbox control-label form-lable">Password</label>
                        </div>

                        <div class="col-md-10 col-sm-9">
                            <input id="password" type="password" value="{{ old('password') }}" class="form-control textbox-controll" name="password">

                            @if ($errors->has('password'))
                                <span class="error-msg validation-error">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' ' : '' }}">
                        
                        <div class="col-md-2 col-sm-3">
                            <label for="password_confirmation" class="form-textbox form-lable">Re-enter Password</label>
                        </div>

                        <div class="col-md-10 col-sm-9">
                            <input id="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control textbox-controll" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="error-msg validation-error">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

              

                    <div class="form-group">
                        <div class="col-md-offset-10 col-md-2 col-sm-offset-9 col-sm-3">
                            <button type="submit" class="btn btn-demo" style="margin-top:0px">
                                Change Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>


@endsection
