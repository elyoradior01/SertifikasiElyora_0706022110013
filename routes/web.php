<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\BooksController;


Route::get('/', function () {
    return view('welcome');
});


// Rute resource untuk Members
Route::resource('members', MembersController::class);


// Rute resource untuk DataPinjam


Route::resource('pinjam', PinjamController::class);


Route::resource('books', BooksController::class);








