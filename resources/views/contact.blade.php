@extends('layouts.app')

@section('content')

<div class="col-md-12">
         @if(Session::has('success_msg'))
            <div class="alert alert-success">
                 <span class="glyphicon glyphicon-true"></span>
                    <em> {!! session('success_msg') !!}</em>
            </div>
        @endif
</div>

<iframe src="https://www.google.co.in/maps/place/Earth+Corporation/@23.2557861,69.668334,21z/data=!4m15!1m9!4m8!1m0!1m6!1m2!1s0x3950e20049f21251:0x95e3199aad3997e!2sEarth+Corporation,+107,+Katira+Complex,,+Ashapura+Ring+Road,+Bhuj,+Gujarat+370001!2m2!1d69.668319!2d23.255785!3m4!1s0x3950e20049f21251:0x95e3199aad3997e!8m2!3d23.255785!4d69.668319" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe>

<section class="darkSection">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">

        <h3>GET IN TOUCH WITH US</h3>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="thumbnail">
            <h5>Address</h5>
            <address>
              107, Katira commercial complex,<br>
              Ashapura Ring Road,<br>
              Bhuj kutch,<br>
              370001.
            </address>
          </div>
        </div>

        <div class="col-md-9 col-sm-6 col-xs-12 ">
          <div class="contact-thumbnail">
            <form method="post" action="{{ url('contact') }}">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="col-sm-2">
                  <lable  class="control-label form-lable" >Name </lable>
                </div>
                <div class="col-sm-10">
                  <input type="text" value="{{ old('name') }}"  class="contact-textbox-controll form-control text-box" name="name" id="name" placeholder="Enter your name" required>
                  @if ($errors->has('name'))
                      <p class="error-msg">
                          {{ $errors->first('name') }}
                      </p>
                  @endif
                </div>

                <div class="col-sm-2">
                  <lable  class="control-label form-lable" >E-mail </lable>
                </div>
                <div class="col-sm-10">
                  <input type="email" value="{{ old('email') }}"  class="form-control contact-textbox-controll text-box" name="email" id="email" placeholder="Enter email address" required>
                  @if ($errors->has('email'))
                      <p class="error-msg">
                          {{ $errors->first('email') }}
                      </p>
                  @endif
                </div>

                <div class="col-sm-2">
                  <lable  class="control-label form-lable" >Subject </lable>
                </div>
                <div class="col-sm-10">
                  <input type="text" value="{{ old('subject') }}"  class="form-control contact-textbox-controll text-box" name="subject" id="subject" placeholder="Enter subject" required>
                  @if ($errors->has('subject'))
                      <p class="error-msg">
                          {{ $errors->first('subject') }}
                      </p>
                  @endif
                </div>

                <div class="col-sm-2">
                  <lable  class="control-label form-lable" >Message </lable>
                </div>
                <div class="col-sm-10">
                  <textarea value="{{ old('message') }}"  class="form-control textarea-controll text-box" name="message"  id="message" required> </textarea>
                  @if ($errors->has('message'))
                      <p class="error-msg">
                          {{ $errors->first('message') }}
                      </p>
                  @endif
                </div>

                <div class="col-sm-2">
                  
                </div>
                <div class="col-sm-10">
                  <input id="send_msg" type="submit" class="btn-default" value="SEND MESSAGE">
                </div>
              </div>
            </form>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>

@endsection