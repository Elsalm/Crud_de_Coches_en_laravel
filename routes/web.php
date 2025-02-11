<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cochesController;
use App\Models\Coche;
Route::get("/", [cochesController::class, "home"]);

Route::post("/create-coche", [cochesController::class, "createCoche"]);
Route::get("/edit-coche/{coche}", [cochesController::class, "showEditCoche"]);
Route::put("/edit-coche/{coche}", [cochesController::class, "EditCoche"]);
Route::delete("/delete-coche/{coche}", [
    cochesController::class,
    "deleteCoche",
]);
