@extends('layouts.admin')
@section('styles')
    <style media="screen">
    .tab-content{
        padding-top: 10px;
    }
    </style>
@endsection
@section('content')
    <link rel="stylesheet" href="{!! asset('tabs/css/tab.css') !!}">
    {{Form::open(['route'=>'product.store','method'=>'post','class'=> 'form-horizontal'])}}
        @include('includes.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Product</h3>
            </div>
            <div class="panel-body">
                <div class="tabbed">
                    @php
                    $p = Request::segment(3);
                    @endphp
                    <ul class="p-tabs">
                        <li {!! $p=='details'? 'class="active"' : '' !!}><a data-toggle="tab" href="#menu2">Size & Color</a></li>
                        <li {!! $p=='size'? 'class="active"' : '' !!}><a data-toggle="tab" href="#menu1">Price</a></li>
                        <li {!! $p=='create'? 'class="active"' : '' !!}><a data-toggle="tab" href="#home">Add Product</a></li>
                    </ul>
                </div>
                
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                {!! Form::textarea('description', null, ['class'=>'form-control summernote']) !!}
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                {!! Form::textarea('description', null, ['class'=>'form-control summernote']) !!}
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                {!! Form::textarea('description', null, ['class'=>'form-control summernote']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <input class="btn btn-success" type="submit" name="" value="Submit">
                    <a class="previous-button btn btn-primary" role="button">Previous</i></a>
                    <a class="next-button btn btn-info" role="button">Next</a>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script>
        $('.previous-button').click(function(){
            $('.p-tabs > .active').next('li').find('a').trigger('click');
            //trigger the click on the tab same like we click on the tab
        });
        $('.next-button').click(function(){
            $('.p-tabs > .active').prev('li').find('a').trigger('click');
            //trigger the click on the tab same like we click on the tab
        });
    </script>
@endsection
