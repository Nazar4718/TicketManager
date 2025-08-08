<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [RegistrationController::class, 'index'])->name('register.index');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::middleware('auth')->group(function(){
   Route::get('/main', [MainController::class, 'index'])->name('main.index');
   Route::middleware('admin')->group(function(){
      Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
   });
   Route::post('/main', [MainController::class, 'store'])->name('main.store');
   Route::get('/comment/{ticket_id}', [CommentController::class, 'index'])->name('comment.index');
   Route::post('/comment/{ticket_id}', [CommentController::class, 'store'])->name('comment.store');
   Route::get('/main{ticket_id}', [MainController::class, 'show'])->name('comment.show');
   Route::delete('/ticket/{ticket_id}', [AdminController::class, 'destroy'])->name('admin.destroy');
   Route::get('/main/low', [AdminController::class, 'low'])->name('admin.low');
   Route::get('/main/medium', [AdminController::class, 'medium'])->name('admin.medium');
   Route::get('/main/high', [AdminController::class, 'high'])->name('admin.high');

});
