@extends('layouts.app')
@section('content')
<div class="col-lg-6 col-md-12">
<h2> Update your Profile</h2>
<form action="{{route('profile.post')}}" method="POST">
@csrf
<div class="form-group">
   <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
</div>


<div class="form-group">
       <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
    </div>

    <div class="form-group">
    <input type="submit" value="submit" name="submit" class="btn btn-primary">        
    </div>
</form>
</div>
@endsection