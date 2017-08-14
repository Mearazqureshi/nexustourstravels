@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12 notification">
                 @if(Session::has('flash_success'))
                    <div class="alert alert-success">
                         <span class="glyphicon glyphicon-right"></span>
                            <em> {!! session('flash_success') !!}</em>
                    </div>
                @endif
            </div>

            <div class="margin70"></div>

                <div class="col-md-12 package-info h2-heading">
                    <h2>Book Package</h2>    
                </div>

            <div class="innerLine col-md-12">
                <form method="post" action="{{ url('book-package') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="package_id" value="{{ $package_id }}">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Name</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" value="{{ $user->name }}" name="name" Placeholder="Enter First Name">
                            @if($errors->first('name'))
                                  <div class="validation-error">
                                    {{ $errors->first('name') }}
                                  </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Mobile Number</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" value="{{ $user->contact_no }}"  name="contact_no" Placeholder="Enter Mobile Number">
                            @if($errors->first('contact_no'))
                              <div class="validation-error">
                                {{ $errors->first('contact_no') }}
                              </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Number Of Person</label>
                        </div>

                        <div class="col-md-9">
                            <input id="no_of_person" class="textbox-controll form-control" type="text" name="no_of_person" Placeholder="Number of person with you">
                            @if($errors->first('no_of_person'))
                              <div class="validation-error">
                                {{ $errors->first('no_of_person') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Source city</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="source_city" value="{{ $package->from }}">
                            @if($errors->first('source_city'))
                              <div class="validation-error">
                                {{ $errors->first('source_city') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Departure city</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="departure_city" value="{{ $package->to }}"> 
                            @if($errors->first('departure_city'))
                              <div class="validation-error">
                                {{ $errors->first('departure_city') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Journey Date</label>
                        </div>

                        <div class="col-md-9">
                            <input placeholder="Journey date" type="text" class="col-md-9 datepicker-textbox form-control datepicker textbox-controll" name="journey_date">
                            @if($errors->first('journey_date'))
                              <div class="validation-error">
                                {{ $errors->first('journey_date') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Total</label>
                        </div>

                        <div class="col-md-9">
                            <input id="total" class="textbox-controll form-control" type="text" name="total" Placeholder="Total" disabled="disabled">
                        </div>

                    </div>

                    <div class="form-group">

                       <div class="col-md-11 no-padding">
                            <button type="submit" class="btn btn-primary btn-show-package">Book Package</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script>
    
    var price = "{{ $package->price }}";

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-d'
    });

    $('#no_of_person').keyup(function(){
        var persons = $('#no_of_person').val();

        $('#total').val(persons * price);
    });

</script>

@endsection