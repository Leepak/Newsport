@extends('main')

@section('title', '| Register')

@section('components')
{{--  	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open() !!}

				{{ Form::label('name', "Name:") }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}

				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}

				{{ Form::label('password_confirmation', 'Confirm Password:') }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
			
				{{ Form::submit('Register', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}

			{!! Form::close() !!}
		</div>
	</div>  --}}
	

	<div class="container">
			<div class="row vertical-offset-100">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
					<div class="jumbotron">
						<div class="panel-heading">
							<h3 id="fonts1">Please sign Up</h3>
						</div>
						<div class="panel-body">
	
							<fieldset>
								{!! Form::open() !!}
								<div class="form-group">
										{{ Form::label('name', "Name:") }}
										{{ Form::text('name', null, ['class' => 'form-control']) }}
	
								</div>
								<div class="form-group">
										{{ Form::label('email', 'Email:') }}
										{{ Form::email('email', null, ['class' => 'form-control']) }}
	
								</div>

								<div class="form-group">
										{{ Form::label('password', 'Password:') }}
										{{ Form::password('password', ['class' => 'form-control']) }}
	
								</div>
								
								<div class="form-group">
										{{ Form::label('password_confirmation', 'Confirm Password:') }}
										{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
	
								</div>
								

								{{ Form::submit('Register', ['class' => 'btn btn-success btn-block form-spacing-top']) }}
								<br>
								<a class="btn btn-info btn-block" href="{{ route('login') }}">back</a>
								{!! Form::close() !!}


							</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection