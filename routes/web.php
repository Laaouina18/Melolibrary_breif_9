<?php
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\SongController::class, 'index'])->name('dashboard');





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('coments');

Route::post('/playlist/add', [App\Http\Controllers\UserPlaylistController::class, 'addSongToPlaylist'])->name('playlist.add');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::post('/songs/{song}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments');

Route::get('/recherche', [SearchController::class, 'index'])->name('search');

// Route::resource('/welcome',HomeController::class);
Route::resource('/',HomeController::class);
Route::resource('/artist',ArtistController::class);
Route::resource('/song',SongController::class);
Route::resource('/genre',GenreController::class);
