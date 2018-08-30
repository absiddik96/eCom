@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-12">
        {{Form::open(['route'=>'product.create','method'=>'get','class'=> 'form-horizontal'])}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add Product</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('type_id', 'Type', ['class'=>'control-label col-md-3']) !!}
                        <div class="col-md-8">
                            {!! Form::select('type', [''=>'Choose']+$types, null, ['class'=>'form-control select','id'=>'type']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('', '', ['class'=>'control-label col-md-3']) !!}
                        <div class="col-md-8">
                            {!! Form::submit('Get', ['class'=>'btn btn-primary','id'=>'submit']) !!}
                        </div>
                    </div>
                </div>
            </div>
        {{Form::close()}}

        
        @if (!empty($aditional_form))
           <div>
                @include($aditional_form)
           </div>
        @endif
    </div>
    
@endsection
@section('scripts')
    @include('includes.productAjaxScript')
    <script>
        $(":input").keypress(function(event){
            if (event.which == '10' || event.which == '13') {
                event.preventDefault();
            }
        });
    </script>
@endsection