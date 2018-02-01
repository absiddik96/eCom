@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Edit Add District / City</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::model($city,['route'=>['sys-city.update',$city->id],'method'=>'PUT'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,$city->country_id,['required','class'=>'form-control','onChange'=>"get_division(this.value);"])}}
                    <label for="">Division / Province / State Name</label>
                    <select class="form-control" name="division_id" id="devision" required>
                        <option value="{{$city->division_id}}">{{$city->division->name}}</option>
                    </select>
                    <label for="">District / City Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update District / City',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    @include('includes.sysLocationAjaxScript')
@endsection
