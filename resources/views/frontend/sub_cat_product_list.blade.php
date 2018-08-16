@extends('layouts.frontend')
@section('content')
	<div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li><a href="{{ route('product_list.type',[$type->slug]) }}">{{ $type->type }}</a></li>
                        <li><a href="{{ route('product_list.cat',[$category->type->slug,$category->slug]) }}">{{ $category->name }}</a></li>
                        <li>{{ $sub_category->name }}</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    {{-- include category & sub category list --}}
                    @include('includes.front.sidebar.cat_sub_list')

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Brands <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Armani (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Versace (12)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Carlo Bruni (15)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Jack Honey (14)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Colours <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour white"></span> White (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour green"></span> Green (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour red"></span> Red (10)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="{{ asset('frontend/img/banner.jpg') }}" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">
                    
                    <div class="row products">
						
						@if ($products->count())
                            @php
                                $p = 1
                            @endphp
							@foreach ($products as $product)
								<div class="col-md-4 col-sm-6">
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
								            <img src="{{ asset('frontend/img/product1.jpg') }}" alt="" class="img-responsive">
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
								    </div>
								    <!-- /.product -->
								</div>
							@endforeach
						@endif

                        {{-- <div class="col-md-4 col-sm-6">
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
                                    <p class="buttons">
                                        <a href="" class="btn btn-default">View detail</a>
                                        <a href="" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                        </div> --}}
                        <!-- /.col-md-4 -->
                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        @if ($products->count())
                        	{{ $products->links() }}
                        @endif
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection

@section('scripts')
  @include('includes.shoppingCartAjaxScript')
@endsection