@extends('main') 
@section('title', '| Login') 
@section('components') 
{{--
<div class="row">

	<br>
	<br>
	<div class="col-md-6 col-md-offset-3">
		{!! Form::open() !!} {{ Form::label('email', 'Email:') }} {{ Form::email('email', null, ['class' => 'form-control']) }} {{
		Form::label('password', "Password:") }} {{ Form::password('password', ['class' => 'form-control']) }}

		<br> {{ Form::checkbox('remember') }}{{ Form::label('remember', "Remember Me") }}

		<br>
		<div class="col-md-3 col-md-offset-3">
			{{ Form::submit('Login', ['class' => 'btn btn-warning btn-block']) }}
		</div>
		<div class="col-md-3 ">

			<a class="btn btn-danger btn-block" href="{{ route('register') }}">Register</a>
			{!! Form::close() !!}
		</div>

	</div> --}}
	<div class="container">
		<div class="row vertical-offset-100">
		<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				<div class="jumbotron">
					<div class="panel-heading">
						<h3 id="fonts1">Sign in</h3>
					</div>
					<div class="panel-body">

						<fieldset>
							{!! Form::open() !!}
							<div class="form-group">
							{{ Form::label('email', 'Email:') }} 
							{{ Form::email('email', null, ['class' => 'form-control','placeholder'=>'Email']) }}

							</div>
							<div class="form-group">
							{{ Form::label('password', "Password:") }} 
							{{ Form::password('password', ['class' => 'form-control','placeholder'=>'Password'])}}

							</div>
							<div class="checkbox">
							<label>
							{{ Form::checkbox('remember') }}{{ Form::label('remember', "Remember Me") }}
							</label>
							</div>
							{{ Form::submit('Login', ['class' => 'btn btn-success btn-block']) }}
							<br>
							<p><a href="{{ url('password/reset') }}">Forgot My Password</a>
								<br>
							<center>Sign Up if you haven't</center>
							{!! Form::close() !!}
							<br>
							<a class="btn btn-info btn-block" href="{{ route('register') }}">Register</a>
							
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection