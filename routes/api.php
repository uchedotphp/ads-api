<?php

use App\Http\Controllers\PopupController;
use Illuminate\Support\Facades\Route;

Route::resource("popups", PopupController::class)
    ->only(["index", "show", "store", "destroy", "update"]);
