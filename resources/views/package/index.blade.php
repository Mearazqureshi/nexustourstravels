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

        @if($packages_count == 0) 
                <div class="col-md-12" style="padding-bottom:400px;">
                    <div class="alert alert-danger" style="background-color: #a94442;border-color: #a94442;" role="alert">
                        <a class="alert-link" style="color:#fff;font-size:16px;">No package found. If you are not getting proper package you can wish for it. <a style="color:red" href="{{ url('wish-package') }}">( Click here.. )</a></a>
                    </div>
                </div>

        @else

            <div class="col-md-2 sortby-box wow flipInY animated padding0" style="width:21.666667%" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: flipInY;" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="col-md-12 padding0">
                    <h2>Price</h2>
                </div>
                
                <div class="col-md-12 padding10">
                    <input class="price-radio" data-value="ASC" type="radio" name="price" value="low"> Low to High
                </div>

                <div class="col-md-12 padding5">
                    <input class="price-radio" data-value="DESC" type="radio" name="price" value="high"> High to Low
                </div>

            </div>

            @foreach($packages as $package)
                <div id="packages_list">
                    <div class="col-md-9 margin190 package-item team-member wow flipInY animated" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: flipInY;" data-wow-duration="1000ms" data-wow-delay="300ms">
                    
                        <div class="col-md-4 no-padding">
                            <img src="{{ url('Packages',$package->image) }}" class="package-list-image">
                        </div>

                        <div class="col-md-5 package-information">
                            <h3>{{ $package->name }}</h3>
                            <span><?php echo mb_substr($package->information, 0, 335).'...'; ?></span>
                        </div>

                        <div class="col-md-3 search-package-last-column">
                            <div class="col-md-12 package-price text-center">
                                @if($package->rate != 0)
                                    <div class="col-md-12">
                                        <span class="rating-amount"><b>Rating :</b> {{ $package->rate }}</span>
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
                </div>
            @endforeach
        

            <div class="col-md-12 pagination">
                {{ $packages->render() }}
            </div>

        @endif

    </div>
</div>

<script>

    $(document).ready(function() {

        var site_url = "{{url('')}}";
        var from = "{{ $from }}";
        var to = "{{ $to }}";

        $('.price-radio').bind("click",function()     
        { 
            var value = $(this).data('value'); 
            var html;
            
            $.ajax({
                type: "POST",
                url: "{{ url('sort_packages') }}",
                dataType: 'json',
                data: {"_token": "{{ csrf_token() }}","sort_by": value ,"from": from,"to":to},
                success: function(data) {
                
                    $.each( data.data, function( key, value ) {

                        html+= '<div class="col-md-9 margin190 package-item team-member wow flipInY animated" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: flipInY;" data-wow-duration="1000ms" data-wow-delay="300ms">';
                    
                        html+= '<div class="col-md-4 no-padding"><img src="'+site_url+'/Packages/'+value.image+'" class="package-list-image"></div>';

                        html+= '<div class="col-md-5 package-information"><h3>'+ value.name +' </h3> <span>'+value.information.substring(0, 335)+'...'+'</span></div>';

                        html+= '<div class="col-md-3 search-package-last-column"><div class="col-md-12 package-price text-center">';
                        
                        if(value.rate != 0){
                            html+= '<div class="col-md-12"><p><b>Rating : </b>'+value.rate+'</p><div class="star-ratings-css"><div class="star-ratings-css-top" style="width:'+value.rate*100/5+'%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div><div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div></div></div>';
                        }
                        
                        html+= '<i class="fa fa-inr"></i><span>'+value.price+'</span></div>';

                        if(value.rate != 0){
                            html+= '<div class="col-md-12 btn-package rating-btn"><a href="'+site_url+'/show-package/'+value.id+'"><button class="btn btn-primary btn-show-package">Show Package</button></a></div>';
                        }

                        else{
                             html+= '<div class="col-md-12 btn-package"><a href="'+site_url+'/show-package/'+value.id+'"><button class="btn btn-primary btn-show-package">Show Package</button></a></div>';
                        }

                        html+= '</div></div>';
                    });


                    $('#packages_list').html(html);
                }
            });
        }); 
    });

</script>

@endsection