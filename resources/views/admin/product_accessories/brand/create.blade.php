@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Add Product Brand</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::open(['route'=>'brand.store','method'=>'POST','enctype' => 'multipart/form-data'])}}
                <label for="">Type</label>
                {{Form::select('type_id',[''=>'Choose']+$types,null,['required','class'=>'form-control'])}}
                <label for="">Brand</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
                <label for="">Icon</label>
                {!! Form::file('icon', []) !!}
                <br>
                {{Form::submit('Add brand',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
