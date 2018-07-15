@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit Product Type</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::model($type,['route'=>['type.update',$type->id],'method'=>'PUT'])}}
                <label for="">Type</label>
                {{Form::text('type',null,['required','class'=>'form-control'])}}
            <br>
                {{Form::submit('Update Type',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
