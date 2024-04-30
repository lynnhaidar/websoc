<?php
use Lynnhaidar\Websoc\Providers\WebSocketServiceProvider;

Route::get('/websocket', function () {
    return view('index');
});

Route::post('/send-message', function (Request $request) {
    event(new NewMessageEvent($request->input('message')));
    return response()->json(['status' => 'success']);
});