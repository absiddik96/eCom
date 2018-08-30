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
    {{Form::open(['route'=>'product-size.store','method'=>'post','class'=> 'form-horizontal'])}}
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
                        {{-- <input type="hidden" name="price_id" value="{{ $price?$price->id:'' }}"> --}}
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Size</label>
                            <div class="col-md-9">
                                <select multiple class="form-control select multiple" name="size[]">
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <a href="{!! route('product-price.create', $product_id) !!}" class=" btn btn-info" >Previous</a>
                    <input class="btn btn-success" type="submit" name="" value="Submit">
                    <a href="{!! route('product-color.create', $product_id) !!}" class=" btn btn-primary" >Skip</a>
                    <input class="btn btn-info" type="submit" name="next" value="Next">
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    @if ($product_sizes->count())
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Product Size List</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Serial No.</th>
                        <th>Size</th>
                        <th>Action</th>
                    </thead>
                    @php
                        $p = 1
                    @endphp
                    <tbody>
                        @foreach ($product_sizes as $ps)
                            <tr>
                                <td>{{ $p++ }}</td>
                                <td>{{ $ps->size->size}}</td>
                                <td>
                                    {{-- {{Form::open(['route'=>['product-size.destroy',$ps->id],'method'=>'DELETE'])}}
                                    {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger pull-right', "onclick" => "return confirm('Are you sure you want to delete this item?');"])}}
                                    {{Form::close()}} --}}
                                    <form class="" action="{!! route('product-size.destroy',$ps->id) !!}" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <input class="btn btn-danger" type="submit" name="" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    @endif
@endsection
