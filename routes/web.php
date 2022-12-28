<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;

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

// REGISTER PAGE
Route::get("/register", [UserController::class, "register"])->name("users.register")->middleware("guest");
Route::post("/register", [UserController::class, "store"])->name("users.store")->middleware("guest");

// LOGIN PAGE
Route::get("/login", [UserController::class, "login"])->name("users.login")->middleware("guest");
Route::post("/login", [UserController::class, "authenticate"])->name("users.authenticate")->middleware("guest");

// LOGOUT
Route::post("/logout", [UserController::class, "logout"])->name("users.logout")->middleware("auth");

// INDEX PAGE
Route::get("/", [NoteController::class, "index"])->name("notes.index")->middleware("auth");

// SHOW PAGE
Route::get("/notes/{note}", [NoteController::class, "show"])->name("notes.show")->where('note', '[0-9]+')->middleware("auth");

// ADD NOTE PAGE
Route::get("notes/add", [NoteController::class, "add"])->name("notes.add")->middleware("auth");
Route::post("/notes/add", [NoteController::class, "store"])->name("notes.store")->middleware("auth");

// DELETE NOTE ROUTE
Route::delete("/notes/{note}/delete", [NoteController::class, "delete"])->name("notes.delete")->middleware("auth");

// EDIT NOTE ROUTE
Route::get("/notes/{note}/edit", [NoteController::class, "edit"])->name("notes.edit")->middleware("auth");
Route::put("/notes/{note}/edit", [NoteController::class, "update"])->name("notes.update")->middleware("auth");

// Route::get("/test", [UserController::class, "test"]);