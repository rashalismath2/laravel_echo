@extends('layouts.app')

@section('content')
    <div id="post">
            <App v-bind:user="{{ Auth::check() ? auth()->user(): "null"}}"
                    v-bind:post="{{$post}}"
                ></App>
    </div>
@endsection

   

