@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Product Sub Category</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Sub Category</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @if (count($sub_categories))
                            @foreach ($sub_categories as $sub_category)
                                <tr>
                                    <td>{{$sub_category->name}}</td>
                                    <td>{{$sub_category->category->name}}</td>
                                    <td>{{$sub_category->type->type}}</td>
                                    <td>
                                        <a href="{{route('sub-category.edit',$sub_category->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>
                                        {{Form::open(['route'=>['sub-category.destroy',$sub_category->id],'method'=>'DELETE'])}}
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
