@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="margin70"></div>

                <div class="col-md-12">
                         @if(Session::has('flash_success'))
                            <div class="alert alert-success">
                                 <span class="glyphicon glyphicon-success"></span>
                                    <em> {!! session('flash_success') !!}</em>
                            </div>
                        @endif
                </div>

                <div class="col-md-12 package-info h2-heading">
                    <h2>Wish Package</h2>    
                </div>

            <div class="innerLine col-md-12">
                <form method="post" action="{{ url('wish-package') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Name</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="name" Placeholder="Enter First Name" value="{{ old('name') }}">
                            @if($errors->first('name'))
                                  <div class="validation-error">
                                    {{ $errors->first('name') }}
                                  </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Number of person with you</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="no_of_person" Placeholder="Enter Number of person with you" value="{{ old('no_of_person') }}">
                            @if($errors->first('no_of_person'))
                                  <div class="validation-error">
                                    {{ $errors->first('no_of_person') }}
                                  </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Source</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="source" Placeholder="Source" value="{{ old('source') }}">
                            @if($errors->first('source'))
                                  <div class="validation-error">
                                    {{ $errors->first('source') }}
                                  </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Destination</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="destination" Placeholder="Destination" value="{{ old('destination') }}">
                            @if($errors->first('destination'))
                                  <div class="validation-error">
                                    {{ $errors->first('destination') }}
                                  </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Email</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="email" name="email" Placeholder="Enter Email" value="{{ old('email') }}">
                            @if($errors->first('email'))
                                  <div class="validation-error">
                                    {{ $errors->first('email') }}
                                  </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Contact Number</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="contact_no" Placeholder="Enter Contact Number" value="{{ old('contact_no') }}">
                            @if($errors->first('contact_no'))
                                  <div class="validation-error">
                                    {{ $errors->first('contact_no') }}
                                  </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Journey Date</label>
                        </div>

                        <div class="col-md-9">
                            <input placeholder="Journey date" type="text" class="col-md-9 datepicker-textbox form-control datepicker textbox-controll" name="journey_date" value="{{ old('journey_date') }}">
                            @if($errors->first('journey_date'))
                              <div class="validation-error">
                                {{ $errors->first('journey_date') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Estimate Amount</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="estimate_amount" Placeholder="Estimate Amount"  value="{{ old('estimate_amount') }}">
                            @if($errors->first('estimate_amount'))
                              <div class="validation-error">
                                {{ $errors->first('estimate_amount') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">

                       <div class="col-md-11 no-padding">
                            <button type="submit" class="btn btn-primary btn-show-package">Wish Package</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script>
    
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-d'
    });

</script>

@endsection