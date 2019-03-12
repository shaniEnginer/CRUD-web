@extends('layouts.app')
@section('content')

    <h1>  Create Post</h1>
<form action="{{ action('Postcontroller@store')}}" method="POST">
@csrf
<div class="form-group">
<label for="title">Title</label>
<input type="text" name="title" id="title"  class="form-control">
</div>
<div class="form-group">
    <label for="body">Body</label>

  <textarea name="body" id="mytextarea" cols="20" rows="5" class="form-control"></textarea>
</div>

<input type="submit" value="submit" class="btn btn-success">
</form>
{{--  </div>  --}}
@endsection