@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit Product category</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::model($category,['route'=>['category.update',$category->id],'method'=>'PUT'])}}
                <label for="">Type</label>
                {{Form::select('type_id',[''=>'Choose']+$types,null,['required','class'=>'form-control'])}}
                <label for="">category</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
            <br>
                {{Form::submit('Update category',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
