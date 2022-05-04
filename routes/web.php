<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Models\Chapter;
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
Route::get('/login', [LoginController::class, "index"])->name('login');
Route::post('/login', [LoginController::class, "store"]);

Route::get('/register', [RegisterController::class, "index"])->name('register');
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/logout', [LogoutController::class, "index"])->name("logout");

Route::get('/', [HomeController::class, "index"])->name("home");

//admin-routes

Route::get('/admin', [AdminController::class, "index"])->name("admin");

Route::get('/admin/manga', [AdminController::class, "manga"]);
Route::get('/admin/manga/create/', [AdminController::class, "mangacreate"])->name("mangacreate");
Route::get('/admin/manga/create/{manga}', [AdminController::class, "mangacreate"])->name("mangaedit");
Route::delete('/admin/manga/{manga}', [AdminController::class, "mangadelete"])->name("mangadelete");

Route::get('/admin/user', [AdminController::class, "user"]);
Route::post('/admin/makeadmin/{user}', [AdminController::class, "makeAdmin"])->name("makeadmin");

Route::post('/admin/manga/create', [AdminController::class, "mangacreate_post"]);

Route::get('/admin/episode', [AdminController::class, "episode"]);
Route::delete('/admin/episode/{chapter}', [AdminController::class, "episode_delete"])->name("episodedelete");
Route::get('/admin/episode/create', [AdminController::class, "episodecreate"])->name("episodecreate");
Route::post('/admin/episode/create', [AdminController::class, "episodecreate_post"]);

//chapter
Route::get('/manga/{chapter}', function (Chapter $chapter){
    return view("chapter", ["chapter" => $chapter]);})->name("readchapter");
