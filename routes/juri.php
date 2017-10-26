<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('juri')->user();

    //dd($users);

    return view('juri.home');
})->name('home');

