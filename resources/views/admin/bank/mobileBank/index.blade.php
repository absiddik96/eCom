@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add Mobile Bank Type</h4>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {{Form::open(['route'=>'mobile-bank.store','method'=>'POST'])}}
                    <label for="">Mobile Bank Name / Type</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Add Mobile Bank',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Mobile Bank Types</h4>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Mobile Bank Type</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if (count($mobileBanks))
                                @foreach ($mobileBanks as $mobileBank)
                                    <tr>
                                        <td>{{$mobileBank->name}}</td>
                                        <td>
                                            <a href="{{route('mobile-bank.edit',$mobileBank->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>

                                            {{Form::open(['route'=>['mobile-bank.destroy',$mobileBank->id],'method'=>'DELETE'])}}
                                            {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger pull-right', "onclick" => "return confirm('Are you sure you want to delete this item?');"])}}
                                            {{Form::close()}}
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
