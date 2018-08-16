@extends('layouts.frontend')

@section('content')
<div id="content">

  <div class="container">
    <div class="col-md-12">
      <div id="main-slider">
        <div class="item">
          <img src="{{ asset('frontend/img/slider.png') }}" alt="" class="img-responsive">
        </div>
        <div class="item">
          <img class="img-responsive" src="{{ asset('frontend/img/main-slider2.jpg') }}" alt="">
        </div>
        <div class="item">
          <img class="img-responsive" src="{{ asset('frontend/img/main-slider3.jpg') }}" alt="">
        </div>
        <div class="item">
          <img class="img-responsive" src="{{ asset('frontend/img/main-slider4.jpg') }}" alt="">
        </div>
      </div>
      <!-- /#main-slider -->
    </div>
  </div>

<!-- *** ADVANTAGES HOMEPAGE ***
  _________________________________________________________ -->
  <div id="advantages">

    <div class="container">
      <div class="same-height-row">
        <div class="col-sm-4">
          <div class="box same-height clickable">
            <div class="icon"><i class="fa fa-heart"></i>
            </div>

            <h3><a href="#">We love our customers</a></h3>
            <p>We are known to provide best possible service ever</p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="box same-height clickable">
            <div class="icon"><i class="fa fa-tags"></i>
            </div>

            <h3><a href="#">Best prices</a></h3>
            <p>You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="box same-height clickable">
            <div class="icon"><i class="fa fa-thumbs-up"></i>
            </div>

            <h3><a href="#">100% satisfaction guaranteed</a></h3>
            <p>Free returns on everything for 3 months.</p>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </div>
  <!-- /#advantages -->

  <!-- *** ADVANTAGES END *** -->

<!-- *** HOT PRODUCT SLIDESHOW ***
  _________________________________________________________ -->
  <div id="hot">

    <div class="box">
      <div class="container">
        <div class="col-md-12">
          <h2>Hot this week</h2>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="product-slider">

        @php
        $p=1;
        @endphp

        @foreach ($top_five_products as $product)
        <div class="item">
          <div class="product">
            <div class="flip-container">
              <div class="flipper">
                <div class="front">
                  <a href="{{ route('product.details',[$product->slug]) }}">
                    <img src="{{ $product->images[0]->image }}" alt="" class="img-responsive">
                  </a>
                </div>
                <div class="back">
                  <a href="{{ route('product.details',[$product->slug]) }}">
                    <img src="{{ $product->images[0]->image }}" alt="" class="img-responsive">
                  </a>
                </div>
              </div>
            </div>
            <a href="{{ route('product.details',[$product->slug]) }}" class="invisible">
              <img src="{{ asset('frontend/img/product2.jpg') }}" alt="" class="img-responsive">
            </a>
            <div class="text">
              <h3><a href="{{ route('product.details',[$product->slug]) }}">{{ $product->title }}</a></h3>
              <p class="price">${{ $product->price }}</p>
              <p class="buttons">
                <a href="{{ route('product.details',[$product->slug]) }}" class="btn btn-default">View detail</a>
                <br>
                <input id="qty_{{ $p }}" type="hidden" value="1">
                <input id="product_id_{{ $p }}" type="hidden" value="{{ $product->id }}">
                <input id="product_code_{{ $p }}" type="hidden" value="{{ $product->product_code }}">
                <input id="product_title_{{ $p }}" type="hidden" value="{{ $product->title }}">
                <input id="product_image_{{ $p }}" type="hidden" value="{{ $product->images[0]->image }}">
                <input id="product_slug_{{ $p }}" type="hidden" value="{{ $product->slug }}">
                <input id="product_type_{{ $p }}" type="hidden" value="{{ $product->type_id }}">
                <input id="product_category_{{ $p }}" type="hidden" value="{{ $product->category_id }}">
                <input id="product_sub_category_{{ $p }}" type="hidden" value="{{ $product->sub_category_id }}">
                <input id="product_price_{{ $p }}" type="hidden" value="{{ $product->price }}">
                <button data-min="{{ $p++ }}" style="margin-top: 10px !important;" class="btn btn-primary add"><i class="fa fa-shopping-cart"></i>Add to cart</button>
              </p>
            </div>
            <!-- /.text -->

            <div class="ribbon sale">
              <div class="theribbon">SALE</div>
              <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon -->

            <div class="ribbon new">
              <div class="theribbon">NEW</div>
              <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon -->

            <div class="ribbon gift">
              <div class="theribbon">GIFT</div>
              <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon -->
          </div>
          <!-- /.product -->
        </div>
        @endforeach

        {{-- <div class="item">
          <div class="product">
            <div class="flip-container">
              <div class="flipper">
                <div class="front">
                  <a href="">
                    <img src="{{ asset('frontend/img/product2.jpg') }}" alt="" class="img-responsive">
                  </a>
                </div>
                <div class="back">
                  <a href="">
                    <img src="{{ asset('frontend/img/product2_2.jpg') }}" alt="" class="img-responsive">
                  </a>
                </div>
              </div>
            </div>
            <a href="" class="invisible">
              <img src="{{ asset('frontend/img/product2.jpg') }}" alt="" class="img-responsive">
            </a>
            <div class="text">
              <h3><a href="">White Blouse Armani</a></h3>
              <p class="price"><del>$280</del> $143.00</p>
            </div>
            <!-- /.text -->

            <div class="ribbon sale">
              <div class="theribbon">SALE</div>
              <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon -->

            <div class="ribbon new">
              <div class="theribbon">NEW</div>
              <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon -->

            <div class="ribbon gift">
              <div class="theribbon">GIFT</div>
              <div class="ribbon-background"></div>
            </div>
            <!-- /.ribbon -->
          </div>
          <!-- /.product -->
        </div> --}}

      </div>
      <!-- /.product-slider -->
    </div>
    <!-- /.container -->

  </div>
  <!-- /#hot -->

  <!-- *** HOT END *** -->

<!-- *** GET INSPIRED ***
  _________________________________________________________ -->
  <div class="container" data-animate="fadeInUpBig">
    <div class="col-md-12">
      <div class="box slideshow">
        <h3>Get Inspired</h3>
        <p class="lead">Get the inspiration from our world class designers</p>
        <div id="get-inspired" class="owl-carousel owl-theme">
          <div class="item">
            <a href="#">
              <img src="{{ asset('frontend/img/getinspired1.jpg') }}" alt="Get inspired" class="img-responsive">
            </a>
          </div>
          <div class="item">
            <a href="#">
              <img src="{{ asset('frontend/img/getinspired2.jpg') }}" alt="Get inspired" class="img-responsive">
            </a>
          </div>
          <div class="item">
            <a href="#">
              <img src="{{ asset('frontend/img/getinspired3.jpg') }}" alt="Get inspired" class="img-responsive">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- *** GET INSPIRED END *** -->

<!-- *** BLOG HOMEPAGE ***
  _________________________________________________________ -->

  <div class="box text-center" data-animate="fadeInUp">
    <div class="container">
      <div class="col-md-12">
        <h3 class="text-uppercase">From our blog</h3>

        <p class="lead">What's new in the world of fashion? <a href="">Check our blog!</a>
        </p>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="col-md-12" data-animate="fadeInUp">

      <div id="blog-homepage" class="row">
        <div class="col-sm-6">
          <div class="post">
            <h4><a href="">Fashion now</a></h4>
            <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a>
            </p>
            <hr>
            <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
            ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            <p class="read-more"><a href="" class="btn btn-primary">Continue reading</a>
            </p>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="post">
            <h4><a href="">Who is who - example blog post</a></h4>
            <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a>
            </p>
            <hr>
            <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
            ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            <p class="read-more"><a href="" class="btn btn-primary">Continue reading</a>
            </p>
          </div>

        </div>

      </div>
      <!-- /#blog-homepage -->
    </div>
  </div>
  <!-- /.container -->

  <!-- *** BLOG HOMEPAGE END *** -->


</div>
<!-- /#content -->


@endsection

@section('scripts')
  @include('includes.shoppingCartAjaxScript')
@endsection