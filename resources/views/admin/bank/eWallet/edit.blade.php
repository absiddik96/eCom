@extends('layouts.admin')

@section('content')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit E-Wallet</h4>
            </div>
            <div class="panel-body">
                @include('errors.error')
                {{Form::model($eWallet,['route'=>['e-wallet.update',$eWallet->id],'method'=>'PUT'])}}
                <label for="">E-Wallet Name / Type</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
            <br>
                {{Form::submit('Update E-Wallet',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
