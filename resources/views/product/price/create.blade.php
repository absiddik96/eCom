@extends('layouts.admin')
@section('styles')
    <style media="screen">
    .tab-content{
        padding-top: 10px;
    }
    .readonly{
        background-color: white !important;
        color: black !important;
    }
    </style>
@endsection
@section('content')
    <link rel="stylesheet" href="{!! asset('tabs/css/tab.css') !!}">
    {{Form::open(['route'=>'product-price.store','method'=>'post','class'=> 'form-horizontal'])}}
        @include('includes.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Product</h3>
            </div>
            <div class="panel-body">
                @include('includes.product.product_add_tab')

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <input type="hidden" name="product_id" value="{{ $product_id }}">
                        <input type="hidden" name="price_id" value="{{ $price?$price->id:'' }}">
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label"></label>
                            <div class="col-md-6">
                                <h3>Buying</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Buying Price</label>
                            <div class="col-md-6">
                                {!! Form::number('buying_price', $price?$price->buying_price:null, ['class'=>'form-control cost','id'=>'buying_price']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Travel Cost</label>
                            <div class="col-md-6">
                                {!! Form::number('travel_cost', $price?$price->travel_cost:null, ['class'=>'form-control cost','id'=>'travel_cost']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Storage Cost</label>
                            <div class="col-md-6">
                                {!! Form::number('storage_cost', $price?$price->storage_cost:null, ['class'=>'form-control cost','id'=>'storage_cost']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Total Cost</label>
                            <div class="col-md-6">
                                {!! Form::number('total_cost', $price?$price->total_cost:null, ['class'=>'form-control readonly','id'=>'total_cost','readonly']) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label"></label>
                            <div class="col-md-6">
                                <h3>Selling</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Profit</label>
                            <div class="col-md-3">
                                <select class="form-control" name="profit_type" id="profit_type">
                                    <option value="">Choose</option>
                                    <option {{ $price?($price->profit_type==1?'selected':''):'' }} value="1">Percentage</option>
                                    <option {{ $price?($price->profit_type==2?'selected':''):'' }} value="2">Amount</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                {!! Form::number('profit', $price?$price->profit:null, ['class'=>'form-control','id'=>'profit','disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Price</label>
                            <div class="col-md-6">
                                {!! Form::number('price', $price?$price->price:null, ['class'=>'form-control readonly','id'=>'price','readonly']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <a href="{!! route('product.details.create', $product_id) !!}" class=" btn btn-info" >Previous</a>
                    <input class="btn btn-success" type="submit" name="" value="Submit">
                    <input class="btn btn-info" type="submit" name="next" value="Next">
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection


@section('scripts')

	<script type="text/javascript">
	$('.cost').keyup(function(){

		var buying_price = parseFloat($('#buying_price').val());
		var travel_cost = parseFloat($('#travel_cost').val());
		var storage_cost = parseFloat($('#storage_cost').val());

		$('#total_cost').val(Math.ceil(buying_price+travel_cost+storage_cost));
	});

    $('#profit_type').on('change',function() {
        if ($(this).val()) {
            $('#profit').prop('disabled',false);
        }else{
            $('#profit').prop('disabled',true);
        }
        if ($('#profit').val()) {
            var total_cost = parseFloat($('#total_cost').val());
    		var profit = parseFloat($('#profit').val());
            var profit_type = $('#profit_type').val();

            if (profit_type=='1') {
                var price = total_cost+(total_cost * profit)/100;
                $('#price').val(Math.ceil(price));
            }

            else if (profit_type=='2') {
                var price = total_cost + profit;
                $('#price').val(Math.ceil(price));
            }
        }
    });

    var profit = $('#profit').val();
    if (profit) {
        $('#profit').prop('disabled',false);
    }

    $('#profit').keyup(function(){
        var total_cost = parseFloat($('#total_cost').val());
		var profit = parseFloat($(this).val());
        var profit_type = $('#profit_type').val();

        if (profit_type=='1') {
            var price = total_cost+(total_cost * profit)/100;
            $('#price').val(Math.ceil(price));
        }

        else if (profit_type=='2') {
            var price = total_cost + profit;
            $('#price').val(Math.ceil(price));
        }
	});

	</script>
@endsection
