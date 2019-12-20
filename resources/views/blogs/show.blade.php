@extends('main')
 @section('title','| View Blog') 
 @section('components')
<div class="row">

	<div class="col-md-4">
		<div class="well">
			<strong>Url Slug:</strong><a href=" {{ url('posts/blogs/'.$blog->slug)}}"> {{ url('posts/blogs/'.$blog->slug)}}</a>
			<br>
			<strong>Create At:</strong> {{ date('M j, Y h:ia', strtotime($blog->created_at)) }}
			<br>
			<strong>Last Updated:</strong> {{ date('M j, Y h:ia', strtotime($blog->updated_at)) }}

			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('blogs.edit', 'Edit', array($blog->id), array('class' => 'btn btn-primary btn-block')) !!}
				</div>
				<div class="col-sm-6">
					{!!Form::Open(['route'=>['blogs.destroy',$blog->id],'method'=>'DELETE'])!!}
					{!!Form::submit('Delete',['class'=>'btn btn-dangerbtn-block'])!!} 
					{!!Form::close()!!} {{-- {!! Html::linkRoute('blogs.destroy', 'Delete', array($blog->id), array('class'
					=> 'btn btn-danger btn-block')) !!} --}}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					{!! Html::linkRoute('blogs.index', 'View More Blogs',[], array('class' => 'btn btn-success btn-block btn-h1-spacing')) !!}
				</div>
			</div>

		</div>


	</div>
	<div class="col-md-8">
			<img src="{{asset('image/'.$blog->image)}}">
			<h1>{{$blog->title}}</h1>
			<p class="lead">{!!$blog->body!!}</p>
		</div>

</div>
</div>
</div>
@endsection