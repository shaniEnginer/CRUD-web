@extends('layouts.app')
@section('content')

<h1>Posts</h1>
<div class="jumbotron">
    
@foreach ($posts as $post)
   
 <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
 {{--  by{{$post->user->name}}  --}}
 {{--  <strong>{{$post->user->name}}</strong>  --}}
 <p>{!!$post->body!!}</p>
 <small><b>{{$post->created_at}}</b></small>
 
<hr>


@endforeach
{{$posts->links()}}
</div>
@endsection