@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add Product Type</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::open(['route'=>'type.store','method'=>'POST'])}}
                    <label for="">Product Type</label>
                    {{Form::text('type',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Add Type',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Product Types</h4>
                </div>
                <div class="panel-body">
                    <table class="table datatable">
                        <thead>
                            <th>Type</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if (count($types))
                                @foreach ($types as $type)
                                    <tr>
                                        <td>{{$type->type}}</td>
                                        <td>
                                            <a href="{{route('type.edit',$type->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>

                                            {{Form::open(['route'=>['type.destroy',$type->id],'method'=>'DELETE'])}}
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
