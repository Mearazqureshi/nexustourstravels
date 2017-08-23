@extends('layouts.app')

@section('content')

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

        <div class="col-md-12 review">
            @foreach($reviews as $review)
                <div class="col-md-12 margin15">
                    <h4><img src="{{ url('images/user.png') }}" class="review-image"> {{ $review->name }}</h4>
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