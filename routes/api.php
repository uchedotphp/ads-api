<?php

use App\Http\Controllers\PopupController;
use Illuminate\Support\Facades\Route;

Route::get("popup/serve/{idem}", [PopupController::class, "fetch"])->name("popups.serve");
Route::resource("popups", PopupController::class)
    ->only(["index", "show", "store", "destroy", "update"]);

Route::get("health", function () {
    return ["status" => "OK"];
});
