@extends('layouts.app')

@section('content')

<link href="{{ asset('css/rating.css') }}" rel="stylesheet">

<div id="myCarousel" class="carousel slide" data-ride="carousel">

              <!-- Indicators -->
<!--               <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol> -->

              <!-- Wrapper for slides -->
              <div class="carousel-inner">

                 <div class="item active">
                    <img src="{{ url('Packages/',$package->image) }}" class="packageSlideImage">
                  </div>

                @foreach($package_images as $image)

                  <div class="item">
                    <img src="{{ url('Packages/'.$package->id.'/'.$image->image) }}" class="packageSlideImage">
                  </div>

                @endforeach

              </div>

               <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>

</div>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="col-md-6"><b>Package Name:</b> {{ $package->name }}</h3>
        <div class="col-md-6 package-price">
          <h3 class="pull-right"><b>Package Price:</b> {{ $package->price }}</h3>
        </div>
      </div>
        <div class="col-md-12 package-info">
            <h2>Package Information</h2>

            <div class="package-description">
                <?php echo $package->information; ?>
            </div>
        </div>

        <!-- <div class="col-md-12 text-center">
          <div class="add-rating">
            <h2>Add Rating</h2>
          </div>
          <div class="rating">
              <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
          </div>
        </div> -->

        <!-- Rating -->
        <div class="col-md-12 text-center">
          
          <div class="add-rating">
            <h2>Rate Us</h2>
          </div>

          <form method="post" action="{{ url('package-confirm') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="package_id" value="{{ $package->id }}">
            <fieldset class="rating col-md-6 col-md-offset-1">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            </fieldset>

        </div>
        <!-- End Rating -->

        <div class="col-md-12" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary btn-show-package">Book Package</button>
        
          </form>            
            <a target="_blank" href="{{ url('package-download',$package->id) }}"><button class="btn btn-download btn-primary btn-show-package" style="margin-right:20px;">Download Package</button>


        </div>

    </div>

</div>

@endsection 