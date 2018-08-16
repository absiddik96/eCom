@extends('layouts.frontend')
@section('content')
	<div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home.index') }}">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        {{-- <form method="post" action=""> --}}

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have {{ Cart::content()->count() }} item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@php
											$p = 1;
										@endphp
                                        @foreach (Cart::content() as $product)
		                                        <tr>
		                                        	<td>
		                                        		<a href="#">
		                                        			<img src="{{ $product->options->product_image }}" alt="">
		                                        		</a>
		                                        	</td>
		                                        	<td><a href="{{ route('product.details',[$product->options->product_slug]) }}">{{ $product->name }}</a>
		                                        	</td>
		                                        	<td>
		                                        		<form id="form_{{ $p }}" action="{{ route('shopping-cart.update') }}">
		                                        			<input type="hidden" name="cart_id" value="{{ $product->rowId }}">
		                                        			{{-- <input name="qty" data-min="{{ $p }}" type="number" value="{{ $product->qty }}" class="form-control update"> <span class="ok_{{ $p }}"></span> --}}

                                                            <span class="wan-spinner demo">
                                                              <a data-min="{{ $p }}" href="javascript:void(0)" class="minus update">-</a>
                                                              <input name="qty" data-min="{{ $p }}" id="qty_{{ $p }}" type="text" value="{{ $product->qty }}" class="qty update">
                                                              <a data-min="{{ $p }}" href="javascript:void(0)" class="plus update">+</a>
                                                              <span class="ok_{{ $p }}"></span>
                                                            </span>
		                                        		</form>
		                                        	</td>
		                                        	<td>${{ $product->price }}</td>
		                                        	<td>$0.00</td>
		                                        	<td>${{ $product->subtotal }}</td>
		                                        	<td><a href="{{ route('shopping-cart.remove',$product->rowId) }}"><i class="fa fa-trash-o"></i></a>
		                                        	</td>
		                                        </tr>
                                        	@php
                                        		$p++
                                        	@endphp
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">${{ Cart::subtotal() }}</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button>
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        {{-- </form> --}}

                    </div>
                    <!-- /.box -->


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

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>{{ Cart::subtotal() }}</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$10.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>{{ Cart::total() }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

					<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				    </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
@endsection

@section('scripts')
	<script>
		var a;
		$('.update').click(function() {
            a = $(this).attr('data-min');
			$('.ok_'+a).html('&nbsp;&nbsp;<button type="submit"><i class="fa fa-check"></i></button>');
		});
	</script>
    @include('includes.shoppingCartAjaxScript')
@endsection