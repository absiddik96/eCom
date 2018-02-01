@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">All Countries</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($countries))
                            @foreach ($countries as $country)
                                <tr>
                                    <td>{{$country->name}}</td>
                                    <td>
                                        <a style="margin-right:5px" href="{{route('sys-country.edit',$country->id)}}" class="btn btn-xs btn-primary pull-left">Edit</a>

                                        {{Form::open(['route'=>['sys-country.destroy',$country->id],'method'=>'DELETE'])}}
                                        {{Form::submit('Delete',['onclick'=>"return confirm('Are you sure you want to delete this item?');",'class'=>'btn btn-xs btn-danger'])}}
                                        {{Form::close()}}

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
@endsection
