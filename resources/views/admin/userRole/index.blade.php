@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add new role</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::open(['route'=>'user-role.store','method'=>'POST'])}}
                    <label for="">Role Name</label>
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    <label for="">Role For</label>
                    <br>
                    {{Form::radio('role_for',0,['active'])}} Personal User
                    <br>
                    {{Form::radio('role_for',1)}} Corporate User
                    <br><br>

                    {{Form::submit('Add Role',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Roles</h4>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Role</th>
                            <th>Role For</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if (count($roles))
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->getRoleFor()}}</td>
                                        <td>
                                            <div class="pull-left">
                                                <a href="{{route('user-role.edit',$role->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>
                                            </div>
                                            <div class="pull-left">
                                                {{Form::open(['route'=>['user-role.destroy',$role->id],'method'=>'DELETE'])}}
                                                {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger pull-right', "onclick" => "return confirm('Are you sure you want to delete this item?');"])}}
                                                {{Form::close()}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No data found</td>
                                    </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
