@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-12">
        {{Form::open(['route'=>'product.index','method'=>'get','class'=> 'form-horizontal'])}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add Product</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('type_id', 'Type', ['class'=>'control-label col-md-3']) !!}
                        <div class="col-md-8">
                            {!! Form::select('type', [''=>'Choose']+$types, null, ['class'=>'form-control select','id'=>'type']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('', '', ['class'=>'control-label col-md-3']) !!}
                        <div class="col-md-8">
                            {!! Form::submit('Get', ['class'=>'btn btn-primary','id'=>'submit']) !!}
                        </div>
                    </div>
                </div>
            </div>
        {{Form::close()}}

        
        @if (count($products))
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered datatable">
                        <thead>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Price</th>
                            <th>Barcode</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr>
                                    <td><img width="65" src="{{ $p->images[0]->image }}"></td>
                                    <td>{{ $p->title }}</td>
                                    <td>{{ $p->brand->name }}</td>
                                    <td>{{ $p->category->name }}</td>
                                    <td>{{ $p->subCategory->name }}</td>
                                    <td>{{ $p->price }}</td>
                                    <td>{{ $p->barcode }}</td>
                                    <td>
                                        <a href="{{ route('product.show',$p->slug) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="panel panel-default">
                <div class="panel-body">
                    No product found
                </div>
            </div>
        @endif
    </div>
    
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