@extends('layouts.app')
@section('content')
<div class="jumbotron">
<h1>{{ $post->title}}</h1>
<h5>{!!$post->body!!}</h5>
<small>{{$post->created_at}} </small>
<hr>
@if(Auth::user()->id == $post->id)
<a href="{{$post->id}}/edit" class="btn btn-primary">edit</a>

{{--   to delete a post  --}}
<form style="float:right " action="{{action('Postcontroller@destroy', $post->id)}}" method="post" >
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
      @else

      @endif
</div>


@endsection