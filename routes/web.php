<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;


Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::group([
    'middleware'=>['auth'],
    'as'=>'front.',
],function(){
    Route::get('book-details/{book}',[BookController::class,'show'])->name('book-details');
    Route::resource('/borrowed-books', BorrowedBookController::class)->only('index','store','update');

});

Route::group([
    'middleware'=>['auth','auth.type:admin'],
    'as'=>'dashboard.',
    'prefix'=>'admin/dashboard',
],function(){    
    Route::get('/', [DashboardController::class,"__invoke"])->name('dashboard');
    Route::resource('/users', UserController::class)->only('index','show');
    Route::resource('/books', BookController::class);
    Route::get('/borrowed-books', [BorrowedBookController::class,'index'])->name('borrowed-books');

});
