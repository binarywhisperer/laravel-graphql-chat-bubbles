<?php

Route::get('/', 'ExampleController@chatBubbles');
Route::get('/test', function () {
    dd(\Auth::user());
});


return view('chat-bubbles');