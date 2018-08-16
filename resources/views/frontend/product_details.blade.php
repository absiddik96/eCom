@extends('layouts.frontend')
@section('content')
	<div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li><a href="{{ route('product_list.type',[$type->slug]) }}">{{ $type->type }}</a></li>
                        <li><a href="{{ route('product_list.cat',[$category->type->slug,$category->slug]) }}">{{ $category->name }}</a></li>
                        <li>
                            <a href="{{ route('product_list.sub_cat',[$sub_category->type->slug,$sub_category->category->slug,$sub_category->slug]) }}">{{ $sub_category->name }}</a>
                        </li>
                        <li>{{ $product->title }}</li>
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

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="{{ asset('images/product/images/'.$product->images[0]->getOriginal('image')) }}" alt="" class="img-responsive">
                            </div>

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

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center">{{ $product->title }}</h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="price">${{ $product->price }}</p>

                                <p class="text-center buttons">
                                    @php
                                        $p=1;
                                    @endphp
                                    <span class="wan-spinner demo">
                                      <a href="javascript:void(0)" class="minus">-</a>
                                      <input id="qty_{{ $p }}" type="text" value="1">
                                      <a href="javascript:void(0)" class="plus">+</a>
                                    </span>
                                    <br>
                                    <input id="product_id_{{ $p }}" type="hidden" value="{{ $product->id }}">
                                    <input id="product_code_{{ $p }}" type="hidden" value="{{ $product->product_code }}">
                                    <input id="product_title_{{ $p }}" type="hidden" value="{{ $product->title }}">
                                    <input id="product_image_{{ $p }}" type="hidden" value="{{ $product->images[0]->image }}">
                                    <input id="product_slug_{{ $p }}" type="hidden" value="{{ $product->slug }}">
                                    <input id="product_type_{{ $p }}" type="hidden" value="{{ $product->type_id }}">
                                    <input id="product_category_{{ $p }}" type="hidden" value="{{ $product->category_id }}">
                                    <input id="product_sub_category_{{ $p }}" type="hidden" value="{{ $product->sub_category_id }}">
                                    <input id="product_price_{{ $p }}" type="hidden" value="{{ $product->price }}">
                                </p>
                                <p class="text-center buttons">
                                    <a href="" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                    <button data-min="{{ $p }}" class="btn btn-primary add"><i class="fa fa-shopping-cart"></i>Add to cart</button> 
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                @if (!empty($product))
                                    @foreach ($product->images as $image)
                                        <div class="col-xs-4">
                                            <a href="{{ asset('images/product/images/'.$image->getOriginal('image')) }}" class="thumb">
                                                <img src="{{ asset('images/product/images/'.$image->getOriginal('image')) }}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        {!! $product->description !!}
                    </div>

                    <div class="box" id="details">
                        @if ($product->sizes->count())
                            <h4>Product Size</h4><hr>
                            @foreach ($product->sizes as $size)
                                <span style="font-size: 25px"><input style="width: 15px; height: 15px;" type="checkbox" name="">{{ $size->size->size }},</span>
                            @endforeach
                        @endif
                        @if ($product->sizes->count() && $product->sizes->count())
                            <br><br>
                        @endif
                        @if ($product->sizes->count())
                            <h4>Product Color</h4><hr>
                            @foreach ($product->colors as $color)
                                <input style="width: 15px; height: 15px;" type="checkbox" name=""><span style="border:1px solid black; background-color: {{ $color->color->color }};padding: 3px 11px 3px 11px;"></span> &nbsp;&nbsp;{{ $color->color->name }},&nbsp;&nbsp; 
                            @endforeach
                        @endif
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
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
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="">
                                                <img src="{{ asset('frontend/img/product1.jpg') }}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="">
                                                <img src="{{ asset('frontend/img/product1_2.jpg') }}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="invisible">
                                    <img src="{{ asset('frontend/img/product1.jpg') }}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="">
                                                <img src="{{ asset('frontend/img/product3.jpg') }}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="">
                                                <img src="{{ asset('frontend/img/product3_2.jpg') }}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="invisible">
                                    <img src="{{ asset('frontend/img/product3.jpg') }}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

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