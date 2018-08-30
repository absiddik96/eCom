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
    {{-- {{Form::open(['route'=>'product-weight.store','method'=>'post','class'=> 'form-horizontal'])}} --}}
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
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Weight</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="weight" value="">
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
    {{-- {!! Form::close() !!} --}}
    @if ($product_weights->count())
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Product Weight List</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Serial No.</th>
                        <th>Weight</th>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    @php
                        $p = 1
                    @endphp
                    <tbody>
                        @foreach ($product_weights as $ps)
                            <tr>
                                <td>{{ $p++ }}</td>
                                <td><div style="width: 30px; height: 30px; background-weight: {{$ps->weight->weight}}; border: 1px solid black"></div></td>
                                <td>{{ $ps->weight->name }}</td>
                                <td>
                                    <form class="" action="{!! route('product-weight.destroy',$ps->id) !!}" method="post">
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
