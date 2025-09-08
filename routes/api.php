<?php

use App\Http\Controllers\GoodsController;
use Illuminate\Support\Facades\Route;

Route::resource('goods', GoodsController::class);
