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
    {{Form::open(['route'=>'product-details.store','method'=>'post','class'=> 'form-horizontal'])}}
        @include('includes.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Product</h3>
            </div>
            <div class="panel-body">
                @include('includes.product.product_add_tab')
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="col-md-6">
                            {{--product_id --}}
                                <input type="hidden" name="product_id" value="{{ $product ? $product->id : '' }}">
                            {{--product_id --}}
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Title</label>
                                <div class="col-md-9">
                                    {!! Form::text('title', $product ? $product->title:null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('description', $product ? $product->description:null, ['class'=>'form-control summernote']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Brand</label>
                                <div class="col-md-9">
                                    {!! Form::select('brand', [''=>'Choose']+$brands, $product ? $product->brand_id:null, ['class'=>'form-control select']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Barcode</label>
                                <div class="col-md-9">
                                    {!! Form::text('barcode', $product ? $product->barcode:null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Key Features</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('key_features', $product ? $product->key_features:null, ['class'=>'form-control summernote']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Type</label>
                                <div class="col-md-9">
                                    <select id="type" name="type" class="form-control" onChange="get_category(this.value);">
                                        @if ($product)
                                            <option value="{{ $product->type_id }}">{{ $product->type->type }}</option>
                                        @else
                                            <option value="">Choose</option>
                                        @endif
                                        @foreach ($types as $t)
                                            <option value="{{ $t->id }}">{{ $t->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="category" id="category" onChange="get_sub_category(this.value);">
                                        @if ($product)
                                            <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                                        @else
                                            <option value="">Choose</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Sub Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="sub_category" id="sub_category">
                                        @if ($product)
                                            <option value="{{ $product->sub_category_id }}">{{ $product->subCategory->name }}</option>
                                        @else
                                            <option value="">Choose</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                    <input class="btn btn-info" type="submit" name="next" value="Next">
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
@section('scripts')
    @include('includes.productAjaxScript')
    <script>
        $(":input").keypress(function(event){
            if (event.which == '10' || event.which == '13') {
                event.preventDefault();
            }
        });
    </script>
@endsection
