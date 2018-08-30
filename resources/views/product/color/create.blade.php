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
    {{Form::open(['route'=>'product-color.store','method'=>'post','class'=> 'form-horizontal'])}}
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
                            <label for="" class="col-md-3 control-label">Color</label>
                            <div class="col-md-9">
                                <select multiple class="form-control select multiple" name="color[]">
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <a href="{!! route('product-size.create', $product_id) !!}" class=" btn btn-info" >Previous</a>
                    <input class="btn btn-success" type="submit" name="" value="Submit">
                    <a href="{!! route('product-weight.create', $product_id) !!}" class=" btn btn-primary" >Skip</a>
                    <input class="btn btn-info" type="submit" name="next" value="Next">
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    @if ($product_colors->count())
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Product Color List</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Serial No.</th>
                        <th>Color</th>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    @php
                        $p = 1
                    @endphp
                    <tbody>
                        @foreach ($product_colors as $ps)
                            <tr>
                                <td>{{ $p++ }}</td>
                                <td><div style="width: 30px; height: 30px; background-color: {{$ps->color->color}}; border: 1px solid black"></div></td>
                                <td>{{ $ps->color->name }}</td>
                                <td>
                                    <form class="" action="{!! route('product-color.destroy',$ps->id) !!}" method="post">
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
