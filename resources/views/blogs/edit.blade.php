@extends('main') 
@section('title','| Edit Blog') 
{!! Html::style('css/select2.min.css')!!}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea'
    });
</script>
@section('components')
<div class="row">
	{!!Form::model($blog, ['route'=>['blogs.update',$blog->id],'method'=>'PUT','files'=>true])!!}
	<div class="col-md-4">
		<div class="well">
				<strong>Create At:</strong>
				{{ date('M j, Y h:ia', strtotime($blog->created_at)) }}
			<br>	
				<strong>Last Updated:</strong>
				{{ date('M j, Y h:ia', strtotime($blog->updated_at)) }}
			<hr>
			<div class="row">
			
				<div class="col-sm-6">
						{{Form::submit('Update',['class'=>'btn btn-danger btn-block'])}}
					{{--  {!! Html::linkRoute('blogs.update', 'Update', array($blog->id), array('class' => 'btn btn-danger btn-block')) !!}  --}}
				</div>
				<div class="col-sm-6">
					{!! Html::linkRoute('blogs.show', 'Back', array($blog->id), array('class' => 'btn btn-success btn-block')) !!}
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		{{Form::label('title','Title:')}} 
		{{Form::text('title',null,["class"=>'form-control'])}}

		{{Form::label('slug','Slug:',["class"=>'form-spacing-top'])}}
		{{Form::text('slug',null,["class"=>'form-control '])}}

		<strong>{{Form:: label('featured_image','Update Featured Image:')}}</strong>
		{{Form::file('featured_image')}}

		{{Form::label('body','Blog:',['class'=>'form-spacing-top'])}}
		{{Form::textarea('body',null,["class"=>'form-control'])}}

	</div>
</div>

</div>
</div>
</div>
{!! Html::script('js/select2.min.js')!!}
@endsection