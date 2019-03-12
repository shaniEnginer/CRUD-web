<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class Postcontroller extends Controller
{

/**
 * 
  this is the constructor
  Implimentation Of Middleware
  @return void
 */
public function __construct()
{
$this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $posts=Post::orderBy('created_at', 'desc')->paginate(3);
        // dd($posts);
        return  view('posts.index')->with('posts' , $posts); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $this->validate($request , [
        'title' =>'required|min:2',
        'body' =>'required|min:5'
    ]);
    $post= new Post();
    $post->title=$request->input('title');
    $post->body=$request->input('body');
    $post->user_id=Auth::user()->id;
    $post->save();
    return redirect('/posts')->with('info', ' Post created succefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        // dd($post->user()->name);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        return view('posts.edit')->with('post', $post);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request , [
            'title' =>'required|max:20',
            'body' =>'required|min:20'
        ]);
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->save();
        return redirect('/posts')->with('success','Post has been edited succefully');
    
    
    }
    


    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd(" reached");
       $post=Post::find($id);
       $post->delete();
       return redirect('/posts')->with('danger', ' Post deleted succefully');

    }
}
