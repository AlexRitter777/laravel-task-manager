<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {


    Route::get('/', function () {
        return redirect()->route('tasks.index');
    });

    Route::resource('tasks', TaskController::class);

});


require __DIR__.'/auth.php';
