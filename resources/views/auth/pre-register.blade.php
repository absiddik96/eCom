@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register As</div>

                    <div class="panel-body">
                        <p>Each user has its specific feature. Select which is suitable for you.</p>
                        <br>
                        <div class="col-sm-6 text-center">
                            <a class="btn btn-primary" href="{{url('/register')}}">Personal User</a>
                        </div>
                        <div class="col-sm-6 text-center">
                            <a class="btn btn-primary" href="{{route('corporateRegister')}}">Corporate User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
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
@endsection
