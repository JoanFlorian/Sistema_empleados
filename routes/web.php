<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\AprendizController;
use Illuminate\Support\Facades\Auth;





Route::get('/', function () {
    return view('auth.login');
});
Route::resource("empleado",EmpleadoController::class)->middleware('admin.auth');
Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin',[AdminController::class, 'index'])->middleware('admin.auth')->name('admin.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aprendiz', [App\Http\Controllers\AprendizController::class, 'index'])->name('aprendiz.index')->middleware('aprendiz.auth');
