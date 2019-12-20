@extends('main')
@section('title', '| All Tags')
@section('components')
	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($hashtags as $hashtag)
					<tr>
						<th>{{ $hashtag->id }}</th>
						<td>{{ $hashtag->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->
		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'hashtags.store', 'method' => 'POST']) !!}
					<h2>New Tag</h2>
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
					{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

