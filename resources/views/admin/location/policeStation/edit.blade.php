@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Edit Upazila / Police Station</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::model($policeStation,['route'=>['sys-police-station.update',$policeStation->id],'method'=>'PUT'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,$policeStation->country_id,['required','class'=>'form-control','onChange'=>"get_division(this.value);"])}}

                    <label for="">Division / Province / State Name</label>
                    <select class="form-control" name="division_id" id="devision" onChange ="get_city(this.value);" required>
                        <option value="{{$policeStation->division_id}}">{{$policeStation->division->name}}</option>
                    </select>

                    <label for="">District / City Name</label>
                    <select class="form-control" name="city_id" id="city"  required>
                        <option value="{{$policeStation->city_id}}">{{$policeStation->city->name}}</option>
                    </select>

                    <label for="">Upazila / Police Station Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update Upazila / Police Station',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    @include('includes.sysLocationAjaxScript')
@endsection
