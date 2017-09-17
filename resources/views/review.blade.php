@extends('layouts.app')

@section('content')
<link href="{{ asset('css/rating.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">

        <div class="col-md-12">
          @if(Session::get('flash_success'))
            <div class="alert alert-success" role="alert">
              <a class="alert-link">{{ Session::get('flash_success') }}</a>
            </div>
          @endif
        </div>

        <div class="col-md-12 package-info h2-heading">
            <h2>Reviews</h2>    
        </div>

        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <h2>Rate: {{ ($rate) }}<div class="star-ratings-css pull-right">
                      <div class="star-ratings-css-top" style="width:{{ $rate*100/5 }}%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                      <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    </div></h2>
        </div>

        <div class="col-md-12 review">
            @foreach($reviews as $review)
                <div class="col-md-12 margin15">
                    <h4><img src="{{ url('images/user.png') }}" class="review-image"> {{ $review->name }}</h4>
                    <div class="star-ratings-css pull-right" style="margin:-40px;margin-right: 30px;">
                      <div class="star-ratings-css-top" style="width:{{ $review->rate*100/5 }}%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                      <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                    </div>
                    <div class="review-border">{{ $review->review }}</div>
                </div>
            @endforeach
        </div>
        <div class="col-md-6 col-md-offset-1">
            {{ $reviews->render() }}
        </div>

        <div class="col-md-12">
            <form method="post" action="{{ url('add-review') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">

                    <hr>
                    <div class="col-md-3">
                        <label>Rate Us : </label>
                    </div>
                    <div class="col-md-9">
                        <fieldset class="rating col-md-6 col-md-offset-1" style="z-index: 1;">
                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        </fieldset>
                    </div>
                    <div class="col-sm-12">
                        <textarea class="textarea form-control marginBottom10" name="review" placeholder="Write a review..."></textarea>    
                    </div>
                    @if($errors->first('review'))
                      <div class="alert alert-danger">
                        {{ $errors->first('review') }}
                      </div>
                    @endif

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary btn-demo margin10">Review</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection