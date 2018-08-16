@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add Product Color</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::open(['route'=>'color.store','method'=>'POST'])}}
                    <label for="">Color Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    <label for="">Choose color &nbsp;&nbsp;&nbsp;</label>
                    <input name="color" type='hidden' id="custom" value="#ffffff">
                    <input name="pre_color" type='hidden' id="pre_color" value="#ffffff">
                    <br>
                    <br>
                    {{Form::submit('Add color',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Product Colors</h4>
                </div>
                <div class="panel-body">
                    <table class="table datatable">
                        <thead>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if (count($colors))
                                @foreach ($colors as $color)
                                    <tr>
                                        <td>{{$color->name}}</td>
                                        <td>
                                            <div style="width: 30px; height: 30px; background-color: {{$color->color}}; border: 1px solid black"></div>
                                        </td>
                                        <td>
                                            <a href="{{route('color.edit',$color->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>

                                            {{Form::open(['route'=>['color.destroy',$color->id],'method'=>'DELETE'])}}
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
@section('scripts')
    @include('includes.productAjaxScript')
@endsection