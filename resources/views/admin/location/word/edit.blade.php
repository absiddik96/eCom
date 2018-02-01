@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Edit Union / Word</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::model($word,['route'=>['sys-word.update',$word->id],'method'=>'PUT'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,$word->country_id,['required','class'=>'form-control','onChange'=>"get_division(this.value);"])}}

                    <label for="">Division / Province / State Name</label>
                    <select class="form-control" name="division_id" id="devision" onChange ="get_city(this.value);" required>
                        <option value="{{$word->division_id}}">{{$word->division->name}}</option>
                    </select>

                    <label for="">District / City Name</label>
                    <select class="form-control" name="city_id" id="city" onChange ="get_police_station(this.value);"  required>
                        <option value="{{$word->city_id}}">{{$word->city->name}}</option>
                    </select>

                    <label for="">Upazila / Police Station Name</label>
                    <select class="form-control" name="police_station_id" id="police_station"  required>
                        <option value="{{$word->police_station_id}}">{{$word->policeStation->name}}</option>
                    </select>

                    <label for="">Union / Word Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Edit Union / Word',['class'=>'btn btn-info'])}}
                    {{Form::close()}}

                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    @include('includes.sysLocationAjaxScript')
@endsection
