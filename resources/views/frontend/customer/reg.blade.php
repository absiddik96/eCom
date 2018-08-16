@extends('layouts.frontend')

@section('content')
	<div id="content">
	    <div class="container">

	        <div class="col-md-12">

	            <ul class="breadcrumb">
	                <li><a href="{{ route('home.index') }}">Home</a>
	                </li>
	                <li>New account / Sign in</li>
	            </ul>

	        </div>

	        <div class="col-md-12">
	            <div class="box">
	                <h1>New account</h1>

	                <p class="lead">Not our registered customer yet?</p>
	                <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
	                <p class="text-muted">If you have any questions, please feel free to <a href="">contact us</a>, our customer service center is working for you 24/7.</p>

	                <hr>

	                @include('includes.errors')

	                <form action="{{ route('customer.reg') }}" method="post">
	                	{{ csrf_field() }}
	                    <div class="col-md-6">
	                    	<div class="form-group">
	                    	    <label for="name">Name</label>
	                    	    <input name="name" type="text" class="form-control" id="name" required>
	                    	</div>
	                    	<div class="form-group">
	                    	    <label for="password">Password</label>
	                    	    <input name="password" type="password" class="form-control" id="password" required>
	                    	</div>
	                    </div>
	                    <div class="col-md-6">
	                    	<div class="form-group">
	                    	    <label for="email">Email</label>
	                    	    <input name="email" type="text" class="form-control" id="email" required>
	                    	</div>
	                    	<div class="form-group">
	                    	    <label for="password">Confirm Password</label>
	                    	    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	                    	</div>
	                    </div>
	                    <div class="text-center">
	                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
	                    </div>
	                </form>
	            </div>
	        </div>

	    </div>
	    <!-- /.container -->
	</div>
@endsection