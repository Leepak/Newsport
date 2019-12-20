@extends('main')

@section('title','| Create Blog')

@section('components')
{{--  {!! Html::style('css/parsley.css')!!}  --}}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea'
    });
</script>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        {!! Form::open (array('route' => 'blogs.store','files'=>true)) !!}
        
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,array('class'=>'form-control','required'=>''))}}

        {{Form::label('slug',' Slug:')}}
        {{Form::text('slug',null,array('class'=>'form-control','required'=>'','min-length'=>'5','max-length'=>'255'))}}

        <strong> {{Form:: label('featured_image','Upload Image:')}} </strong> 
        {!! Form::file('featured_image') !!} 

        {{Form::label('body',' Blog Body:')}}
        {{Form::textarea('body',null,array('class'=>'form-control'))}}

        {{Form::submit('Create blog',array('class'=>'btn btn-warning', ' style'=>'margin-top:20px;'))}}
        {!! Form::close() !!}    
</div>
</div>
@endsection

