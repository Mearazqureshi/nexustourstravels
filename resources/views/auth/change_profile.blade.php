@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12 package-info">
            <h2>Change Profile</h2>    
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
            
            <div class="">

                 <div class="col-md-2 col-sm-3 col-xs-12">
                    <img src="{{ url('images/user.png') }}" class="profile-image col-md-12">
                </div>
                
                <div class="col-md-9">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/change-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' ' : '' }}">
                            <div class="col-md-2 col-sm-3">
                                <label for="name" class="form-textbox control-label form-lable">Name</label>
                            </div>

                            <div class="col-md-10 col-sm-9">
                                <input id="name" type="text" class="form-control textbox-controll" name="name" value="{{ $user->name }}">

                                @if ($errors->has('name'))
                                    <span class="error-msg validation-error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact_no') ? ' ' : '' }}">
                            
                            <div class="col-md-2 col-sm-3">
                                <label for="contact_no" class="form-textbox form-lable">Contact Number</label>
                            </div>

                            <div class="col-md-10 col-sm-9">
                                <input id="contact_no" type="text" class="form-control textbox-controll" name="contact_no" value="{{ $user->contact_no }}">

                                @if ($errors->has('contact_no'))
                                    <span class="error-msg validation-error">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                  

                        <div class="form-group">
                            <div class="col-md-offset-10 col-md-2 col-sm-offset-9 col-sm-3">
                                <button type="submit" class="btn btn-blog" style="margin-top:0px">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
