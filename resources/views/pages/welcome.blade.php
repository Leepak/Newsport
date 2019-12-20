@extends('main')
@section('title', '| Home')
@section('components')

    <div class="row">
        <div class="col-md-12">
                <div class="jumbotron">
                        <h1>Welcome to the blog!</h1>
                        <p>...</p>
                        <p><a class="btn btn-primary btn-lg" href="/news" role="button">Read more</a></p>
                      </div>
                      <div class="row">
                            <div class="col-md-8">
                            @foreach($blog as $blogs)
                                <div class="post">
                                    <h3> {{$blogs->title}}</h3>
                                    <p> {{$blogs->body}}</p>
                                    <a href="{{ url('posts/blogs/'.$blogs->slug)}}" class="btn btn-primary">read More</a>
                            </div>
                            @endforeach
                        <hr>
                            

                            

</div>
@endsection