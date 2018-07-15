@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit Product Color</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::model($color,['route'=>['color.update',$color->id],'method'=>'PUT'])}}
                <label for="">Color</label>
                {{Form::text('color',null,['required','class'=>'form-control'])}}
            <br>
                {{Form::submit('Update color',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
