<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;


Route::resource("empleado",EmpleadoController::class);