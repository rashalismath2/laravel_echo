<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post){
        return response()->json($post->comments()->with('users')->latest()->get());
    }

    // didnt care about mas assignable ?
    public function store(Request $request,Post $post){
        $comment=App\Comment::create(['body'=>$request->body,
                                        'user_id'=>auth()->user()->id,
                                        'post_id'=>$post->id]);

        return $comment->toJson();
    }

}
