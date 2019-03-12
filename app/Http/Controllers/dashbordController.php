<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class dashbordController extends Controller
{
    //

public function __construct()
{
    $this->middleware('verified');

    $this->middleware('auth');
}



    public function index()
    {
$user_id=Auth::user()->id;
$user= User::find($user_id);
return view('dashbord.index')->with('posts', $user->posts);

    }



    public function getprofile()
    {
        $user=Auth::user();
        return view('dashbord.getprofile')->with('user', $user);
    }



    public function postprofile(Request $request)
    {
   
   
       $this->validate( $request ,[ 
       'name'=>'required|unique:users',
       'email'=>'required|unique:users',
       ]);
       Auth::user()->update([
           'name'=>$request->input('name'), 
           'email'=>$request->input('email'),
       ]);
       dd("Passed validations");
    }
}



















