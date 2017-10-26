<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('panitium')->user();

    //dd($users);

    return view('panitium.home');
})->name('home');

