@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update country</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::model($country,['route'=>['sys-country.update',$country->id],'method'=>'PUT'])}}
                    <label for="">Name</label>
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update Country',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
    </div>

@endsection
