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
Route::get("/notes/{note}", [NoteController::class, "show"])->name("notes.show");

// ADD NOTE PAGE
Route::get("/notes/add", [NoteController::class, "add"])->name("notes.add");