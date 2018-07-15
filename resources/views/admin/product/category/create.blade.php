@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Add Product category</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::open(['route'=>'category.store','method'=>'POST'])}}
                <label for="">Type</label>
                {{Form::select('type_id',[''=>'Choose']+$types,null,['required','class'=>'form-control'])}}
                <label for="">Category</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
                <br>
                {{Form::submit('Add category',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
