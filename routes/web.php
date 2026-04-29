<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\OgolneController::class, 'start'] );

require __DIR__.'/ferrari.php';
