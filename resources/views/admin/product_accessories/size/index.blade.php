@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add Product Size</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::open(['route'=>'size.store','method'=>'POST'])}}
                    <label for="">Product Size</label>
                    {{Form::text('size',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Add size',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Product Sizes</h4>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Size</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if (count($sizes))
                                @foreach ($sizes as $size)
                                    <tr>
                                        <td>{{$size->size}}</td>
                                        <td>
                                            <a href="{{route('size.edit',$size->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>

                                            {{Form::open(['route'=>['size.destroy',$size->id],'method'=>'DELETE'])}}
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
    </div>
@endsection
