@extends('layouts.admin')
@section('styles')
    <style media="screen">
    .tab-content{
        padding-top: 10px;
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
                            <label for="" class="col-md-3 control-label">Buying Price</label>
                            <div class="col-md-6">
                                {!! Form::text('buying_price', $price?$price->buying_price:null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Travel Cost</label>
                            <div class="col-md-6">
                                {!! Form::text('travel_cost', $price?$price->travel_cost:null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Storage Cost</label>
                            <div class="col-md-6">
                                {!! Form::text('storage_cost', $price?$price->storage_cost:null, ['class'=>'form-control']) !!}
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
