@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-8 text-sucess">{{$data["post"]->title}}</h1>
        <label class="mr-2">{{$data["post"]->updated_at->toDateString()}}</label>
        <span class="badge badge-success">Published</span>
        
        <hr class="my-4">
        <p>{{$data["post"]->description}}</p>
        <hr class="my-4">

        <div class="form-group">
           <form action="" method="post">
            <label for="my-textarea">Comments</label>
            <textarea id="my-textarea" placeholder="Comment.." class="form-control" name="" rows="3"></textarea>
            <button class="btn btn-success btn-md" type="submit">Comment</button>
           </form>
        </div>
        
        <div class="comments">
            @foreach ($data["comments"] as $comment)
                <img style="vertical-align:text-top" src="https://img.icons8.com/bubbles/50/000000/see-male-account.png">
                <div class="card-text d-inline-block">
                    <strong>{{$comment->user->name}} Said..</strong>
                    <p>{{$comment->body}}</p>
                    <span>{{$comment->updated_at->toDateString()}}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
