<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Events\NewComment;
use App\Http\Requests\ValidatePost;

class CommentController extends Controller
{
    public function index(Post $post){
        return response()->json($post->comments()->with('user')->latest()->get(),200);
    }

    // didnt care about mas assignable ?
    public function store(ValidatePost $request,Post $post){
        $comment=Comment::create(['body'=>$request->body,
                                        'user_id'=>auth()->user()->id,
                                        'post_id'=>$post->id]);

        $comment=Comment::where('id',$comment->id)->with('user')->first();

        broadcast(new NewComment($comment))->toOthers();

        return $comment->toJson();
    }

}
