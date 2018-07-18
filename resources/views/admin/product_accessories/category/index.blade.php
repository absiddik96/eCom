@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Product Category</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @if (count($categories))
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->type->type}}</td>
                                    <td>
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>
                                        {{Form::open(['route'=>['category.destroy',$category->id],'method'=>'DELETE'])}}
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
