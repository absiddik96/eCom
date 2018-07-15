@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit Product Size</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::model($size,['route'=>['size.update',$size->id],'method'=>'PUT'])}}
                <label for="">Size</label>
                {{Form::text('size',null,['required','class'=>'form-control'])}}
            <br>
                {{Form::submit('Update size',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
