@extends('main')
@section('title', '| Blog')
@section('components')
	<div class="row">
		<div class="col-md-8">
			<h1 id="fonts1">Blog</h1>
		</div>
	</div>

	@foreach ($blog as $blogs)
	<div class="row">
		<div class="col-md-8 ">
			<h2>{{ $blogs->title }}</h2>
			<h5>Published: {{ date('M j, Y', strtotime($blogs->created_at)) }}</h5>

			<p>{{ substr($blogs->body, 0, 250) }}{{ strlen($blogs->body) > 250 ? '...' : "" }}</p>

			<a href="{{ route('pages.url', $blogs->slug) }}" class="btn btn-warning">Read More</a>
			<hr>
		</div>
	</div>
	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
                    {!! $blog->links() !!}
			</div>
		</div>
	</div>


@endsection