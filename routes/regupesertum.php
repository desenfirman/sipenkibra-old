<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('regupesertum')->user();

    //dd($users);

    return view('regupesertum.home');
})->name('home');

