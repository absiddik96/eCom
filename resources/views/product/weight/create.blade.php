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
    {{Form::open(['route'=>'product-weight.store','method'=>'post','class'=> 'form-horizontal'])}}
    <div class="form-horizontal">
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
                        <input type="hidden" name="weight_id" value="{{ $weight?$weight->id:null }}">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Weight</label>
                            <div class="col-md-6">
                                {!! Form::text('weight', $weight?$weight->weight:null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <a href="{!! route('product-color.create', $product_id) !!}" class=" btn btn-info" >Previous</a>
                    <input class="btn btn-success" type="submit" name="" value="Submit">
                    <a href="{!! route('product-image.create', $product_id) !!}" class=" btn btn-primary" >Skip</a>
                    <input class="btn btn-info" type="submit" name="next" value="Next">
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
