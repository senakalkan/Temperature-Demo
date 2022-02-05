<?php

use App\Http\Controllers\TemperatureController;
use Illuminate\Support\Facades\Route;

Route::apiResource("temperature",TemperatureController::class);
