@extends('main') 
@section('title', "| $blog->title") 
@section('components')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
        <img src="{{asset('image/'.$blog->image)}}">
        <h1>{{$blog->title}}</h1>
        <p>{{$blog->body}}</p>
	</div>

</div>
@endsection