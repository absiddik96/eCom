@extends('layouts.admin')

@section('content')
    
    @include($aditional_show, ['product' => $product])
    
@endsection
