@extends('layouts.app')

@section('content')

<div class="margin70"></div>

<div class="col-md-12 search-vehicle">
        <div class="form-group">
            <div class="col-md-2">
                <label>Search Vehicle</label>
            </div>
            <form method="post" action="{{ url('search-vehicle') }}">
                {{ csrf_field() }}
                <div class="col-md-7">
                    <input type="text" name="vehicle_name" placeholder="Enter vehicle name" class="search-vehicle-textbox" required autofocus>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-show-package btn-search-vehicle">Search</button>
                </div>
            </form>

        </div>
</div>

<div class="container">
    <div class="row">

        @if($vehicles_count == 0)
            <div class="col-md-12 no-package">
                <div class="alert alert-danger" style="background-color: #a94442;border-color: #a94442;" role="alert">
                    <a class="alert-link" style="color:#fff;font-size:16px;">No Vehicles found.</a>
                </div>
            </div>
        @endif

        @foreach($vehicles as $vehicle)
            <div class="col-md-12 package-item wow flipInY animated" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: flipInY;" data-wow-duration="1000ms" data-wow-delay="300ms">
        
                <div class="col-md-4 no-padding">
                    <img src="{{ url('Vehicles/',$vehicle->image) }}" class="package-list-image">
                </div>

                <div class="col-md-5 vehicle-information">
                    <h3>{{ $vehicle->name }}</h3>
                   <!--  <p class="col-md-6"><b>Rate per KM: </b><i class="fa fa-inr"></i> {{ $vehicle->rent_per_km }}</p>
                    <p class="col-md-6"><b>Number Of seat: </b>{{ $vehicle->no_of_seats }}</p>
                    <p class="col-md-6"><b>Vehicle type: </b>{{ $vehicle->type }}</p>
                    <p class="col-md-6"><b>Category: </b>{{ $vehicle->category }}</p> -->
                    <p><?php echo $vehicle->facilities; ?></p>
                </div>

                <div class="col-md-2 col-md-offset-1 search-package-last-column">
                    <div class="col-md-12 package-price">
                        <i class="fa fa-inr"></i><span> {{ $vehicle->basic_rent }}</span>
                    </div>

                    <div class="col-md-12 btn-package">
                        <a href="{{ url('book-vehicle',$vehicle->id) }}"><button class="btn btn-primary btn-show-package">Book Vehicle</button></a>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection