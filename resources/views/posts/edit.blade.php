@extends('layouts.app')
@section('content')
<h1>  Edit Post</h1>
<form action="{{ action('Postcontroller@update', $post->id)}}" method="POST">

        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title"  class="form-control" value="{{$post->title}}">
        </div>


        <div class="form-group">
            <label for="body">Title</label>
        <textarea name="body" id="mytextarea" cols="30" rows="10" class="form-control">
            {{$post->body}}
        </textarea>
            </div>

        <input type="submit" value="submit" class="btn btn-success">


</form>
@endsection