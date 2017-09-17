@extends('layouts.app')

@section('content') 

<div class="container">
    <div class="row">

        <div class="col-md-12" style="margin-top:30px;">
             @if(Session::has('flash_success'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span>
                    <em> {!! session('flash_success') !!}</em>
                </div>
             @endif
        </div>

        <div class="col-md-12">
            <!-- <div class="margin70"></div> -->

            <div class="col-md-12 booking-heading text-center">
                <h1>Vehicle Information</h1>
            </div>

            <div class="innerLine col-md-12">
                <div class="col-md-6">
                    <img src="{{ url('Vehicles',$vehicle->image) }}" class="vehicle-image">
                </div>
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td><b><h4>Vehicle Name  </b></h4></td><td><h4> : {{ $vehicle->name }}</h4></td>
                        </tr>

                        <tr>
                            <td><b><h4>Vehicle Type  </b></h4></td><td><h4> : {{ $vehicle->type }}</h4></td>
                        </tr>

                        <tr>
                            <td><b><h4>Average  </b></h4></td><td><h4> : {{ ($vehicle->rent_per_km*300) }}(300KM + Rate per KM)</h4></td>
                        </tr>

                        <tr>
                            <td><b><h4>Rent per KM  </b></h4></td><td><h4> : {{ $vehicle->rent_per_km }}</h4></td>
                        </tr>

                        <tr>
                            <td><b><h4>Category  </b></h4></td><td><h4> : {{ $vehicle->category }}</h4></td>
                        </tr>

                        <tr>
                            <td style="position:absolute;"><b><h4>Facilities  </b></h4></td><td><h4> : <?php echo $vehicle->facilities; ?></h4></td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="col-md-12 booking-heading text-center">
                <h1>Book Vehicle</h1>
            </div>

            <div class="innerLine col-md-12">
                <form id="myForm" method="post" action="{{ url('book-vehicle') }}">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <input type="hidden" name="vehicle_id" value="{{ $vehicle_id }}">

                        <div class="col-md-2">
                            <label>Name</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" value="{{ $user->name or old('name') }}" name="name" Placeholder="Enter Name">
                        
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
                            <input class="textbox-controll form-control" type="text" value="{{ $user->contact_no or old('contact_no') }}" name="contact_no" Placeholder="Enter Mobile Number">
                        
                            @if($errors->first('contact_no'))
                              <div class="validation-error">
                                {{ $errors->first('contact_no') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Number of days</label>
                        </div>

                        <div class="col-md-9">
                            <input id="no_of_days" class="textbox-controll form-control" type="text" name="no_of_days" Placeholder="Number of days"  value="{{ old('no_of_days') }}">
                        
                            @if($errors->first('no_of_days'))
                              <div class="validation-error">
                                {{ $errors->first('no_of_days') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>From</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="from" Placeholder="From"  value="{{ old('from') }}">
                        
                            @if($errors->first('from'))
                              <div class="validation-error">
                                {{ $errors->first('from') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>To</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" type="text" name="to" Placeholder="To"  value="{{ old('to') }}">
                        
                            @if($errors->first('to'))
                              <div class="validation-error">
                                {{ $errors->first('to') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Hire date</label>
                        </div>
                        <div class="input-group date col-md-9">
                            <input placeholder="Hire date" type="text" class="datepicker-textbox form-control datepicker textbox-controll" name="hire_date"  value="{{ old('hire_date') }}">
                            <div class="input-group-addon date-icon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        
                            @if($errors->first('hire_date'))
                                  <div class="validation-error col-md-9">
                                    {{ $errors->first('hire_date') }}
                                  </div>
                            @endif
                        </div>

                    </div>



                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Killo Meter</label>
                        </div>

                        <div class="col-md-9">
                            <input id="km" class="textbox-controll form-control" type="text" name="km" Placeholder="Enter KM" value="{{ old('km') }}">
                        
                            @if($errors->first('km'))
                              <div class="validation-error">
                                {{ $errors->first('km') }}
                              </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Payment Method</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="radio" name="payment_method" value="offline_payment" checked> Offline Payment
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="payment_method" value="half_payment" id="half_payment"> 50% Payment
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="payment_method" value="full_payment"> Full Payment
                                </div>
                                @if($errors->first('payment_method'))
                                  <div class="validation-error">
                                    {{ $errors->first('payment_method') }}
                                  </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Total</label>
                        </div>

                        <div class="col-md-9">
                            <input class="textbox-controll form-control" id="total" type="text" name="total" Placeholder="Total" disabled="disabled"  value="{{ old('total') }}">
                       
                            @if($errors->first('total'))
                              <div class="validation-error">
                                {{ $errors->first('total') }}
                              </div>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">

                       <div class="col-md-11 no-padding">
                            <button type="submit" class="btn btn-primary btn-show-package">Book Vehicle</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script>
$(document).ready(function(){
    var rent_per_km = "{{ $vehicle->rent_per_km }}";
    var disabled_dates = '{!! $booked_vehicle !!}';
    var basic_rent = 300*rent_per_km;

    $('#total').val(basic_rent);

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-d',
        datesDisabled: disabled_dates,
    });

    $('#km').change(function(){
        var km = $('#km').val();
        if(km >300){
            $('#total').val((rent_per_km*km));
        }
        else{
            $('#total').val(basic_rent);
        }
    });

    $('#myForm input').on('change', function() {
        var count = 0;
        var count2 = 0;
        if($('input[name=payment_method]:checked', '#myForm').val() == 'half_payment'){
            if(count==0){
                $('#total').val($('#total').val()/2);
                count++;
            }
            else{
                var km = $('#km').val();
                if(km >300){
                    $('#total').val((rent_per_km*km));
                }
                else{
                    $('#total').val(basic_rent);
                }
            }
        }
        else{
            if(count2==0){
                var km = $('#km').val();
                if(km >300){
                    $('#total').val((rent_per_km*km));
                }
                else{
                    $('#total').val(basic_rent);
                }
                count2++;
            }
        } 
    });
});
</script>

@endsection