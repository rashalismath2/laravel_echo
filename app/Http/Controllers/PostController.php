<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request,Post $post){
        return view("post")->with('data',["post"=>$post
                                            ,"comments"=>$post->comments()->with('user')->get()]);
    }
}
