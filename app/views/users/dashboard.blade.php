@extends('users/userlayout')

@section('content')

	{{ Form::open(array('url' => 'dashboard')) }}
		<h1>User Dashboard</h1>

		<!-- if there are login errors, show them here -->
		@if (Session::get('dashboardError'))
		<div class="alert alert-danger">{{ Session::get('dashboardError') }}</div>
		@endif

		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
			{{ $errors->first('name') }}
		</p>

		<p>
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email', $usersData["email"], array('placeholder' => 'awesome@awesome.com')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name',$usersData["name"]) }}
		</p>

		<p>
			{{ Form::label('address', 'Address') }}
			{{ Form::text('address',$usersDetail["address"]) }}
		</p>

		<p>
			{{ Form::label('pincode', 'Zip') }}
			{{ Form::text('pincode',$usersDetail["pincode"]) }}
		</p>


		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}


@stop
