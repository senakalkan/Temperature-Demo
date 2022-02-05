<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(
        [
            "Firstname" =>"Sena",
            "Lastname" =>"Kalkan",
        ]
    );
});
