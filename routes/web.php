<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLoggedInUser;
use Illuminate\Support\Facades\Route;
use League\Flysystem\ChecksumProvider;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/showuserpost', [UserController::class,'showUserPost']);

Route::get('/adduser', function () {
    return view('adduser');
})->name('adduser');

Route::get('/showallusers',[UserController::class,'showallusers'])->name('showallusers');

Route::post('/addpostuser',[UserController::class,'addPostUser']);

Route::get('/update/{id}',[UserController::class,'update'])->name('update');

Route::post('/updatepostuser/{id}',[UserController::class,'updatepostuser'])->name('updatepostuser');

Route::post('deleteuser/{userid}',[UserController::class,'deleteuser'])->name('deleteuser');

Route::get('/login',[LoginController::class,'checkLogin'])->name('login');

Route::post('/loginpost',[LoginController::class,'authenticate']);
