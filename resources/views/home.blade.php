@extends('layouts.app')

@section('content')

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Tours and travels is one of the best travels site and one of the best site to hire a vehicles in bhuj as well as hire vehicles in gujarat.">
<meta name="keywords" content="Car hire in bhuj,Vehicles hire in bhuj,car hire in gujarat vehicles hire in gujarat,Holidays in bhuj, Advanture vehicles in bhuj,"/>
<meta name="description2" content="Find the best prices on Carhire car hire and read customer reviews. Book online today with the world's biggest online car rental service. Save on luxury, economy and family car hire."/>
<meta name="keywords" content="car hire, cheap car hire, car rental uk,  rent a car, car rentals, uk car car, cheap car rentals spain, cheap car rental usa, carrentals, rent car, car hire comparison, carrental, carhire, compare car hire, car rental comparison, rentalcars, rental cars"/>
<link href="{{ asset('css/rating.css') }}" rel="stylesheet">
<style>
body{
  margin: 0px !important;
}
</style>
<div class="fluid_container home-images">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="{{ asset('images/photo-1499678329028-101435549a4e.jpg') }}" alt="Los Angeles" class="slideImage">
                  <h2 class="home-image-text">GREAT JOURNEY</h2>
                </div>

                <div class="item">
                  <img src="{{ asset('images/photo-1496664232858-ae3480e5d308.jpg') }}" alt="Los Angeles" class="slideImage">
                  <h2 class="home-image-text">GREAT JOURNEY</h2>
                </div>

                <div class="item">
                  <img src="{{ asset('images/photo-1498503603722-8de8df0beb96.jpg.jpg') }}" alt="Los Angeles" class="slideImage">
                  <h2 class="home-image-text">GREAT JOURNEY</h2>
                </div>

                <div class="item">
                  <img src="{{ asset('images/home00.jpg') }}" alt="Los Angeles" class="slideImage">
                  <h2 class="home-image-text">GREAT JOURNEY</h2>
                </div>
              </div>

              <!-- Left and right controls -->
              <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a> -->
            </div>

            <!-- Corosol image -->
            @if(isset($vehicles[0]))
                <article id="demo-default" class="demo">

                    <h2>Our vehicles</h2>

                    <div id="coverflow">
                        <ul class="flip-items">
                          @if(isset($vehicles[0]))
                            <a href="{{ url('book-vehicle',$vehicles[0]->id) }}">
                              <li data-flip-title="Red">
                                  <img class="scroll-image" src="{{ url('Vehicles/',$vehicles[0]->image) }}">
                              </li>
                            </a>
                          @endif

                          @if(isset($vehicles[1]))
                            <a href="{{ url('book-vehicle',$vehicles[1]->id) }}">
                              <li data-flip-title="Razzmatazz" data-flip-category="Purples">
                                  <img class="scroll-image" src="{{ url('Vehicles/',$vehicles[1]->image) }}">
                               </li>
                            </a>
                          @endif

                          @if(isset($vehicles[2]))
                            <a href="{{ url('book-vehicle',$vehicles[2]->id) }}">
                              <li data-flip-title="Deep Lilac" data-flip-category="Purples">
                                  <img class="scroll-image" src="{{ url('Vehicles/',$vehicles[2]->image) }}">
                              </li>
                            </a>
                          @endif

                          @if(isset($vehicles[3]))
                            <a href="{{ url('book-vehicle',$vehicles[3]->id) }}">
                              <li data-flip-title="Daisy Bush" data-flip-category="Purples">
                                  <img  class="scroll-image" src="{{ url('Vehicles/',$vehicles[3]->image) }}">
                              </li>
                            </a>
                          @endif

                          @if(isset($vehicles[4]))
                            <a href="{{ url('book-vehicle',$vehicles[4]->id) }}">
                              <li data-flip-title="Cerulean Blue" data-flip-category="Blues">
                                  <img class="scroll-image" src="{{ url('Vehicles/',$vehicles[4]->image) }}">
                              </li>
                            </a>
                          @endif

                          @if(isset($vehicles[5]))
                            <a href="{{ url('book-vehicle',$vehicles[5]->id) }}">
                              <li data-flip-title="Dodger Blue" data-flip-category="Blues">
                                  <img class="scroll-image" src="{{ url('Vehicles/',$vehicles[5]->image) }}">
                              </li>
                            </a>
                          @endif

                          @if(isset($vehicles[6]))
                            <a href="{{ url('book-vehicle',$vehicles[6]->id) }}">
                              <li data-flip-title="Cyan" data-flip-category="Blues">
                                  <img class="scroll-image" class="scroll-image" src="{{ url('Vehicles/',$vehicles[6]->image) }}">
                              </li>
                            </a>
                          @endif

                          @if(isset($vehicles[7]))
                            <a href="{{ url('book-vehicle',$vehicles[7]->id) }}">
                              <li data-flip-title="Robin's Egg" data-flip-category="Blues">
                                  <img class="scroll-image" src="{{ url('Vehicles/',$vehicles[7]->image) }}">
                              </li>
                            </a>
                          @endif

                          @if(isset($vehicles[8]))
                            <a href="{{ url('book-vehicle',$vehicles[8]->id) }}">
                              <li data-flip-title="Deep Sea" data-flip-category="Greens">
                                  <img class="scroll-image" src="{{ url('Vehicles/',$vehicles[8]->image) }}">
                              </li>
                            </a>
                          @endif

                          @if(isset($vehicles[9]))
                            <a href="{{ url('book-vehicle',$vehicles[9]->id) }}">
                              <li data-flip-title="Apple" data-flip-category="Greens">
                                  <img class="scroll-image" src="{{ url('Vehicles/',$vehicles[9]->image) }}">
                              </li>
                            </a>
                          @endif
                        </ul>

                    </div>
              </article>
            <!-- End corosol -->
            @endif

    <!-- Search Button -->
      <div class="col-md-12">
        <a href="{{ url('vehicle-list') }}"><button class="btn btn-primary btn-demo">Search more vehicles </button></a>
      </div>
    <!-- End Search Button -->

</div>

<div class="container">
    <div class="row">
               <div class="col-md-12 package-info h2-heading">
            <h2>Reviews</h2>    
        </div>

        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" id="rate">
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
        <!-- <div class="col-md-6 col-md-offset-1">
            {{ $reviews->render() }}
        </div> -->

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
                          <a class="col-md-2 col-md-offset-8 review-link" href="{{ url('review') }}">See all reviews</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $('.margin70').css("margin-top","0px");

    $( document ).ready(function() {

      !function(a,b,c){"use strict";function d(a,b){var c=null;return function(){var d=this,e=arguments;null===c&&(c=setTimeout(function(){a.apply(d,e),c=null},b))}}var e=function(){var a={};return function(b){if(a[b]!==c)return a[b];var d=document.createElement("div"),e=d.style,f=b.charAt(0).toUpperCase()+b.slice(1),g=["webkit","moz","ms","o"],h=(b+" "+g.join(f+" ")+f).split(" ");for(var i in h)if(h[i]in e)return a[b]=h[i];return a[b]=!1}}(),f="http://www.w3.org/2000/svg",g=function(){var a;return function(){if(a!==c)return a;var b=document.createElement("div");return b.innerHTML="<svg/>",a=b.firstChild&&b.firstChild.namespaceURI===f}}();a.fn.flipster=function(h){var i="string"==typeof h?!0:!1;if(i){var j=Array.prototype.slice.call(arguments,1);return this.each(function(){var b=a(this).data("methods");return b[h]?b[h].apply(this,j):this})}var k={itemContainer:"ul",itemSelector:"li",start:"center",fadeIn:400,loop:!1,autoplay:!1,pauseOnHover:!0,style:"coverflow",spacing:-.6,click:!0,keyboard:!0,scrollwheel:!0,touch:!0,nav:!1,buttons:!1,buttonPrev:"Previous",buttonNext:"Next",onItemSwitch:!1},l=a.extend({},k,h),m=a(b),n=e("transform"),o={main:"flipster",active:"flipster--active",container:"flipster__container",nav:"flipster__nav",navChild:"flipster__nav__child",navItem:"flipster__nav__item",navLink:"flipster__nav__link",navCurrent:"flipster__nav__item--current",navCategory:"flipster__nav__item--category",navCategoryLink:"flipster__nav__link--category",button:"flipster__button",buttonPrev:"flipster__button--prev",buttonNext:"flipster__button--next",item:"flipster__item",itemCurrent:"flipster__item--current",itemPast:"flipster__item--past",itemFuture:"flipster__item--future",itemContent:"flipster__item__content"},p=new RegExp("\\b("+o.itemCurrent+"|"+o.itemPast+"|"+o.itemFuture+")(.*?)(\\s|$)","g"),q=new RegExp("\\s\\s+","g");return this.each(function(){function b(a){var b="next"===a?l.buttonNext:l.buttonPrev;return"custom"!==l.buttons&&g?'<svg viewBox="0 0 13 20" xmlns="'+f+'" aria-labelledby="title"><title>'+b+'</title><polyline points="10,3 3,10 10,17"'+("next"===a?' transform="rotate(180 6.5,10)"':"")+"/></svg>":b}function e(c){return c=c||"next",a('<button class="'+o.button+" "+("next"===c?o.buttonNext:o.buttonPrev)+'" role="button" />').html(b(c)).on("click",function(a){v(c),a.preventDefault()})}function h(){l.buttons&&H.length>1&&(M.find("."+o.button).remove(),M.append(e("prev"),e("next")))}function i(){var b={};!l.nav||H.length<=1||(J&&J.remove(),J=a('<ul class="'+o.nav+'" role="navigation" />'),L=a(""),H.each(function(c){var d=a(this),e=d.data("flip-category"),f=d.data("flip-title")||d.attr("title")||c,g=a('<a href="#" class="'+o.navLink+'">'+f+"</a>").data("index",c);if(L=L.add(g),e){if(!b[e]){var h=a('<li class="'+o.navItem+" "+o.navCategory+'">'),i=a('<a href="#" class="'+o.navLink+" "+o.navCategoryLink+'" data-flip-category="'+e+'">'+e+"</a>").data("category",e).data("index",c);b[e]=a('<ul class="'+o.navChild+'" />'),L=L.add(i),h.append(i,b[e]).appendTo(J)}b[e].append(g)}else J.append(g);g.wrap('<li class="'+o.navItem+'">')}),J.on("click","a",function(b){var c=a(this).data("index");c>=0&&(v(c),b.preventDefault())}),"after"===l.nav?M.append(J):M.prepend(J),K=J.find("."+o.navItem))}function j(){if(l.nav){var b=I.data("flip-category");K.removeClass(o.navCurrent),L.filter(function(){return a(this).data("index")===O||b&&a(this).data("category")===b}).parent().addClass(o.navCurrent)}}function k(){M.css("transition","none"),F.css("transition","none"),H.css("transition","none")}function r(){M.css("transition",""),F.css("transition",""),H.css("transition","")}function s(){var b,c=0;return H.each(function(){b=a(this).height(),b>c&&(c=b)}),c}function t(b){b&&k(),G=F.width(),F.height(s()),H.each(function(c){var d,e,f=a(this);f.attr("class",function(a,b){return b&&b.replace(p,"").replace(q," ")}),d=f.outerWidth(),0!==l.spacing&&f.css("margin-right",d*l.spacing+"px"),e=f.position().left,N[c]=-1*(e+d/2-G/2),c===H.length-1&&(u(),b&&setTimeout(r,1))})}function u(){var b,d,e,f=H.length;H.each(function(c){b=a(this),d=" ",c===O?(d+=o.itemCurrent,e=f+1):O>c?(d+=o.itemPast+" "+o.itemPast+"-"+(O-c),e=c):(d+=o.itemFuture+" "+o.itemFuture+"-"+(c-O),e=f-c),b.css("z-index",e).attr("class",function(a,b){return b&&b.replace(p,"").replace(q," ")+d})}),O>=0&&(G&&N[O]!==c||t(!0),n?F.css("transform","translateX("+N[O]+"px)"):F.css({left:N[O]+"px"})),j()}function v(a){var b=O;if(!(H.length<=1))return"prev"===a?O>0?O--:l.loop&&(O=H.length-1):"next"===a?O<H.length-1?O++:l.loop&&(O=0):"number"==typeof a?O=a:a!==c&&(O=H.index(a)),I=H.eq(O),O!==b&&l.onItemSwitch&&l.onItemSwitch.call(M,H[O],H[b]),u(),M}function w(a){return l.autoplay=a||l.autoplay,clearInterval(P),P=setInterval(function(){var a=O;v("next"),a!==O||l.loop||clearInterval(P)},l.autoplay),M}function x(){return clearInterval(P),l.autoplay&&(P=-1),M}function y(){t(!0),M.hide().css("visibility","").addClass(o.active).fadeIn(l.fadeIn)}function z(){return F=M.find(l.itemContainer).addClass(o.container),H=F.find(l.itemSelector),H.length<=1?void 0:(H.addClass(o.item).each(function(){var b=a(this);b.children("."+o.itemContent).length||b.wrapInner('<div class="'+o.itemContent+'" />')}),l.click&&H.on("click.flipster touchend.flipster",function(b){Q||(a(this).hasClass(o.itemCurrent)||b.preventDefault(),v(this))}),h(),i(),O>=0&&v(O),M)}function A(a){l.keyboard&&(a[0].tabIndex=0,a.on("keydown.flipster",d(function(a){var b=a.which;37===b?(v("prev"),a.preventDefault()):39===b&&(v("next"),a.preventDefault())},250,!0)))}function B(a){if(l.scrollwheel){var b,c,e=!1,f=0,g=0,h=0;a.on("mousewheel.flipster wheel.flipster",function(){e=!0}).on("mousewheel.flipster wheel.flipster",d(function(a){clearTimeout(g),g=setTimeout(function(){f=0,h=0},300),a=a.originalEvent,h+=a.wheelDelta||-1*(a.deltaY+a.deltaX),Math.abs(h)<25||(f++,b=h>0?"prev":"next",c!==b&&(f=0),c=b,(6>f||f%3===0)&&v(b),h=0)},50)),m.on("mousewheel.flipster wheel.flipster",function(a){e&&(a.preventDefault(),e=!1)})}}function C(a){if(l.touch){var b,c,e,f,g=!1,h=d(v,300);a.on({"touchstart.flipster":function(a){a=a.originalEvent,Q=a.touches?a.touches[0].clientX:a.clientX,g=a.touches?a.touches[0].clientY:a.clientY},"touchmove.flipster":d(function(a){Q!==!1&&(a=a.originalEvent,b=a.touches?a.touches[0].clientX:a.clientX,c=a.touches?a.touches[0].clientY:a.clientY,e=c-g,f=b-Q,Math.abs(e)<100&&Math.abs(f)>=30&&(h(0>f?"next":"prev"),Q=b,a.preventDefault()))},100),"touchend.flipster touchcancel.flipster ":function(){Q=!1}})}}function D(){if(M.css("visibility","hidden"),z(),H.length<=1)return void M.css("visibility","");M.addClass([o.main,n?"flipster--transform":" flipster--no-transform",l.style?"flipster--"+l.style:"",l.click?"flipster--click":""].join(" ")),l.start&&(O="center"===l.start?Math.floor(H.length/2):l.start),v(O);var a=M.find("img");if(a.length){var b=0;a.on("load",function(){b++,b>=a.length&&y()}),setTimeout(y,750)}else y();m.on("resize.flipster",d(t,400)),l.autoplay&&w(),l.pauseOnHover&&F.on("mouseenter.flipster",x).on("mouseleave.flipster",function(){-1===P&&w()}),A(M),B(F),C(F)}var E,F,G,H,I,J,K,L,M=a(this),N=[],O=0,P=!1,Q=!1;E={jump:v,next:function(){return v("next")},prev:function(){return v("prev")},play:w,pause:x,index:z},M.data("methods",E),M.hasClass(o.active)||D()})}}(jQuery,window);

        var wheel = $("#wheel").flipster({
            style: 'wheel',
            spacing: 0
        });

        $("#coverflow").flipster();

        $('.navbar').css( "background-color","rgba(0, 0, 0, 0.26)");
        $('.navbar').css( "border-bottom","1px solid rgba(255,255,255,.15)");
        $('.navbar-default .navbar-nav>li>a, .navbar-default .navbar-text').css('color','#fff'); 
        $('.navbar-brand').css('color','#fff');   

        window.onscroll = function (e) {  
            $('.navbar').css( "background-color","#fff");
            $('.navbar').css( "border-color","#fff");
            $('.navbar-default .navbar-nav>li>a, .navbar-default .navbar-text').css('color','#777');
            $('.navbar-brand').css('color','#777');

            if($(window).scrollTop() == 0)
            {
                $('.navbar').css( "background-color","rgba(0, 0, 0, 0.26)");
                $('.navbar').css( "border-color","rgba(0, 0, 0, 0)");
                $('.navbar-default .navbar-nav>li>a, .navbar-default .navbar-text').css('color','#fff');
                $('.navbar-brand').css('color','#fff');
            }
        }

    });

</script>

@endsection
