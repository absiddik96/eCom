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
    {{Form::open(['route'=>'product-image.store','method'=>'post','class'=> 'form-horizontal', 'enctype' => 'multipart/form-data'])}}
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
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input name="image[]" type="file" multiple class="file" data-preview-file-type="any"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <a href="{!! route('product-weight.create', $product_id) !!}" class=" btn btn-info" >Previous</a>
                    <input class="btn btn-success" type="submit" name="" value="Submit">
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    @if ($product_images->count())
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Product Image List</h3>
            </div>
            <div class="panel-body">
                @foreach ($product_images as $pi)
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a target="_blank" href="{!! asset('images/product/images/'.$pi->getOriginal('image')) !!}">
                                <img src="{{ $pi->image }}" alt="" style="width:100%; height: 300px">
                                <div class="caption">
                                    <form class="" action="{!! route('product-image.destroy',$pi->id) !!}" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <input class="btn btn-danger" type="submit" name="" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                    </form>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{-- <table class="table table-bordered">
                    <thead>
                        <th>Serial No.</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    @php
                        $p = 1
                    @endphp
                    <tbody>
                        @foreach ($product_images as $pi)
                            <tr>
                                <td>{{ $p++ }}</td>
                                <td><img width="100px" height="100px" src="{{ $pi->image }}" alt=""></td>
                                <td>
                                    <form class="" action="{!! route('product-image.destroy',$pi->id) !!}" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <input class="btn btn-danger" type="submit" name="" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
            <div class="panel-footer">

            </div>
        </div>
    @endif
@endsection
