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
                <label for="">Color Name</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
                <br>
                <label for="">Choose color &nbsp;&nbsp;&nbsp;</label>
                <input name="color" type='hidden' id="custom" value="#ffffff">
                <input name="pre_color" type='hidden' id="pre_color" value="{{ $color->color }}">
                <br>
                <br>
                {{Form::submit('Update color',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('includes.productAjaxScript')
@endsection