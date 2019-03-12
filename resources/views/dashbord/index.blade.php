@extends('layouts.app')
@section('content')

<h1>Your posts</h1>
<div class="panel-body">
<table class="table table-striped">
    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
    </tr>
    @foreach ($posts as $post)
    @if(count($posts)>0)
    <tr>
       
       
            <td>
             <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
         </td>
            <td>
                    <form  action="{{action('Postcontroller@destroy', $post->id)}}" method="post" >
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
            </td>
             <td>
                    <a href="{{$post->id}}/edit" class="btn btn-primary">edit</a>
                </td>
      
      
</tr>

@else
<h5>You have no Posts</h5>
@endif
@endforeach
</table>
</div>
@endsection