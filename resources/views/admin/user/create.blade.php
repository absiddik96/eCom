@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Create User</h2>
                </div>

                <div class="panel-body">
                    <div class="col-sm-12 text-center">
                        <button id="personal-user" type="button" name="button">Create Personal User</button>
                        <button id="corporate-user" type="button" name="button">Create Corporate User</button>
                        <hr>
                        @include('errors.error')
                    </div>

                    <div id="personal-user-form" class="col-sm-12" style="display:none">

                        <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    <h4 class="">Personal User</h4>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    <p id="message"></p>
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="gender" class="col-md-4 control-label">Gender</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option value="">I am</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob" class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control" name="dob" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-md-4 control-label">Role / Registered as</label>
                                <div class="col-md-6">
                                    {{Form::select('role_id',[''=>'Choose']+$personalroles,null,['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div id="corporate-user-form" class="col-sm-12" style="display:none">
                        <form class="form-horizontal" method="POST" action="{{ route('user.corporate.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    <h4 class="">Corporate User</h4>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="" class="col-md-4 control-label">Company Name</label>
                                <div class="col-md-6">
                                    <input id="cname" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="cemail" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="cemail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="cpassword" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cpassword-confirm" class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="cpassword-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    <p id="cmessage"></p>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="role" class="col-md-4 control-label">Role / Registered as</label>
                                <div class="col-md-6">
                                    {{Form::select('role_id',[''=>'Choose']+$corporateroles,null,['class'=>'form-control'])}}
                                </div>

                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


            @endsection

            @section('scripts')
                <script type="text/javascript">
                $(document).ready(function(){
                    $('#personal-user').click(function(){
                        $('#corporate-user-form').hide();
                        $('#personal-user-form').show(300);
                    });
                    $('#corporate-user').click(function(){
                        $('#personal-user-form').hide();
                        $('#corporate-user-form').show(300);
                    });
                });
                </script>

                <script type="text/javascript">
                $('#password-confirm').on('keyup', function () {
                    if ($('#password').val() == $('#password-confirm').val()) {
                        $('#message').html('Matching').css('color', 'green');
                        $('#password-confirm').css('background-color', 'green');
                    } else
                    {
                        $('#message').html('Not Matching').css('color', 'red');
                        $('#password-confirm').css('background-color', 'red');
                    }
                });
                </script>
                <script type="text/javascript">
                $('#cpassword-confirm').on('keyup', function () {
                    if ($('#cpassword').val() == $('#cpassword-confirm').val()) {
                        $('#cmessage').html('Matching').css('color', 'green');
                        $('#cpassword-confirm').css('background-color', 'green');
                    } else
                    {
                        $('#cmessage').html('Not Matching').css('color', 'red');
                        $('#cpassword-confirm').css('background-color', 'red');
                    }
                });
                </script>
        @endsection
