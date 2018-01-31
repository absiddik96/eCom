@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit Role</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::model($role,['route'=>['user-role.update',$role->id],'method'=>'PUT'])}}
                <label for="">Role Name</label>
                {{Form::text('name',null,['class'=>'form-control'])}}
                <br>
                {{Form::submit('Update Role',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
