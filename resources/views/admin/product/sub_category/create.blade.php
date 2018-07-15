@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Add Product Sub Category</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::open(['route'=>'sub-category.store','method'=>'POST'])}}
                <label for="">Type</label>
                {{Form::select('type_id',[''=>'Choose']+$types,null,['required','class'=>'form-control','onChange'=>"get_category(this.value);"])}}
                <label for="">Category</label>
                <select class="form-control" name="category_id" id="category" required>
                    <option value="">Choose</option>
                </select>
                <label for="">Sub Category</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
                <br>
                {{Form::submit('Add sub category',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('includes.productAjaxScript')
@endsection