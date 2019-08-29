<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//get comments. Doesnt need to be logged in
Route::get("post/{id}/comments","CommentController@index");

Route::middleware("auth:api")->group(function(){
    Route::post("post/{id}/comment","CommentController@store");
});

