@extends('layouts.app')

@section('content')

<style>
    
.star-ratings-css {
  unicode-bidi: bidi-override;
  color: #c5c5c5;
  font-size: 25px;
  height: 25px;
  width: 100px;
  margin: 0 auto;
  position: relative;
  padding: 0;
  text-shadow: 0px 1px 0 #a2a2a2;
}

.star-ratings-css-top {
    color: #e74c3c;
    padding: 0;
    position: absolute;
    z-index: 1;
    display: block;
    top: 0;
    left: 0;
    overflow: hidden;
  }

.star-ratings-css-bottom {
    padding: 0;
    display: block;
    z-index: 0;
  }

</style>

<div class="container">
    <div class="row">

        @if($packages_count == 0) 
            <div class="col-md-12 no-package">
                <div class="alert alert-danger" style="background-color: #a94442;border-color: #a94442;" role="alert">
                    <a class="alert-link" style="color:#fff;font-size:16px;">No package found.</a>
                </div>
            </div>
        @endif
        
        @foreach($packages as $package)
            <div class="col-md-12 package-item team-member wow flipInY animated" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: flipInY;" data-wow-duration="1000ms" data-wow-delay="300ms">
            
                <div class="col-md-4 no-padding">
                    <img src="{{ url('Packages',$package->image) }}" class="package-list-image">
                </div>

                <div class="col-md-5 package-information">
                    <h3>{{ $package->name }}</h3>
                    <?php echo mb_substr($package->information, 0, 437).'...'; ?>
                </div>

                <div class="col-md-3 search-package-last-column">
                    <div class="col-md-12 package-price text-center">
                        @if($package->rate != 0)
                            <div class="col-md-12">
                                <p><b>Rating : </b>{{ $package->rate }}</p>
                                <div class="star-ratings-css">
                                  <div class="star-ratings-css-top" style="width:{{ $package->rate*100/5 }}%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                  <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                </div>
                            </div>
                        @endif
                        <i class="fa fa-inr"></i><span> {{ $package->price }}</span>
                    </div>

                    @if($package->rate != 0)
                        <div class="col-md-12 btn-package rating-btn">
                            <a href="{{ url('show-package',$package->id) }}"><button class="btn btn-primary btn-show-package">Show Package</button></a>
                        </div>
                    @else
                        <div class="col-md-12 btn-package">
                            <a href="{{ url('show-package',$package->id) }}"><button class="btn btn-primary btn-show-package">Show Package</button></a>
                        </div>
                    @endif

                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection