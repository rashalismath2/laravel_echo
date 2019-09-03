<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware("auth:api")->group(function(){
    Route::post("post/{post}/comment","CommentController@store");
    Route::get("post/{post}/comment","CommentController@index");

});

