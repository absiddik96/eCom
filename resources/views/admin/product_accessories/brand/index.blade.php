@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Product Brand</h4>
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <th>Icon</th>
                        <th>Brand</th>
                        <th>Type</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @if (count($brands))
                            @foreach ($brands as $brand)
                                <tr>
                                    <td><img width="65" src="{{$brand->icon}}"></td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->type->type}}</td>
                                    <td>
                                        <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>
                                        {{Form::open(['route'=>['brand.destroy',$brand->id],'method'=>'DELETE'])}}
                                        {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger pull-right', "onclick" => "return confirm('Are you sure you want to delete this item?');"])}}
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="2">No data found</td>
                                </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
