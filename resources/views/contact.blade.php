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

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3665.6813349489985!2d69.6705741!3d23.2546804!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3950e2004b9205d3%3A0x35f2fa22d4969b80!2sNexus+Tours+Travels%2C+107+Katira+Commercial+complex%2C+Bhuj%2C+Gujarat+370001!5e0!3m2!1sen!2sin!4v1508227001727" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

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