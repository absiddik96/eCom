@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit Mobile Bank</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::model($mobileBank,['route'=>['mobile-bank.update',$mobileBank->id],'method'=>'PUT'])}}
                <label for="">Mobile Bank Name / Type</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
            <br>
                {{Form::submit('Update Mobile Bank',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
