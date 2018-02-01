@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Edit New Division / Province / State</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::model($division,['route'=>['sys-division.update',$division->id],'method'=>'PUT'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,null,['required','class'=>'form-control'])}}
                    <label for="">Division / Province / State Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update Division',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
    </div>

@endsection
