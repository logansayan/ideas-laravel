<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// INDEX PAGE
Route::get("/", [NoteController::class, "index"])->name("notes.index");


// SHOW PAGE
Route::get("/notes/{note}", [NoteController::class, "show"])->name("notes.show")->where('note', '[0-9]+');

// ADD NOTE PAGE
Route::get("notes/add", [NoteController::class, "add"])->name("notes.add");
Route::post("/notes/add", [NoteController::class, "store"])->name("notes.store");

// DELETE NOTE ROUTE
Route::delete("/notes/{note}/delete", [NoteController::class, "delete"])->name("notes.delete");

// EDIT NOTE ROUTE
Route::get("/notes/{note}/edit", [NoteController::class, "edit"])->name("notes.edit");
Route::put("/notes/{note}/edit", [NoteController::class, "update"])->name("notes.update");