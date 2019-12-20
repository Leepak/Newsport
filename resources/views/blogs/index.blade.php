@extends('main')

@section('title','| Dashboard Blog')
@section('components')
<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('blogs.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>S. no</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>
                        @foreach ($blog as $blogs)
						
						<tr>
							<th>{{ ++$i }}</th>
							<td>{{ $blogs->title }}</td>
							<td>{{ substr($blogs->body, 0, 50) }}{{ strlen($blogs->body) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($blogs->created_at)) }}</td>
							<td><a href="{{ route('blogs.show', $blogs->id) }}" class="btn btn-default btn-sm">View</a> 
							<a href="{{ route('blogs.edit', $blogs->id) }}" class="btn btn-default btn-sm">Edit</a></td>
						</tr>

					@endforeach


				</tbody>
			</table>
		</div>
	</div>
	{!! $blog->render() !!}

@endsection