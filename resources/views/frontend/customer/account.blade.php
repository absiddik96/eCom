@extends('layouts.frontend')

@section('content')
<div id="content">
	<div class="container">

		<div class="col-md-12">

			<ul class="breadcrumb">
				<li><a href="{{ route('home.index') }}">Home</a>
				</li>
				<li>My account</li>
			</ul>

		</div>

		<div class="col-md-3">
			@include('includes.front.customer.menu')
		</div>

		<div class="col-md-9">
			<div class="box">
				<h1>My account</h1>
				<p class="lead">Hello {{ strtoupper(Auth::user()->name) }}</p>
				<p class="text-muted">From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>

				<h3>Contact information</h3>

				<div style="line-height: 5px;">
					<p>
						{{ Auth::user()->name }}
					</p>
					<p>
						{{ Auth::user()->email }}
					</p>
				</div>

				<hr>

				<h3>Address</h3>

				<div style="line-height: 5px">
					<p>
						C-83, Pathantola, Dhamrai, Dhaka
					</p>
				</div>

				<hr>

				<h3>Delivery  Address</h3>

				<div style="line-height: 5px">
					<p>
						C-83, Pathantola, Dhamrai, Dhaka
					</p>
				</div>
				
			</div>
		</div>

	</div>
	<!-- /.container -->
</div>
@endsection