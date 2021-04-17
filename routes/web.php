<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginController::class, 'login'])->name("login");
Route::post('/loginValidade', [LoginController::class, 'loginValidade'])->name("loginValidade");
Route::get("/", [UserController::class, "getAllUsers"])->name("index")->middleware("auth");
Route::get("/create", [UserController::class, "createUser"])->name("create");
Route::post("/save", [UserController::class, "saveUser"])->name("save");
Route::get("/show/{id}", [UserController::class, "getOneUser"])->name("show")->middleware("auth");
Route::put("/edit/{id}", [UserController::class, "editUser"])->name('edit')->middleware("auth");
Route::delete("/delete", [UserController::class, "delete"])->name('delete')->middleware("auth");
Route::post("/find", [UserController::class, "findUser"])->name("find")->middleware("auth");