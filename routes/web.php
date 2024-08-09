<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'homepage']);
Route::get('/post_details/{id}', [HomeController::class, 'post_details']);
Route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth');
Route::post('/user_post', [HomeController::class, 'user_post'])->middleware('auth');
Route::get('/myPosts', [HomeController::class, 'myPosts'])->middleware('auth');
Route::get('/delete_mypost/{id}', [HomeController::class, 'delete_mypost'])->middleware('auth');
Route::get('/edit_mypost/{id}', [HomeController::class, 'edit_mypost'])->middleware('auth');
Route::post('/update_post/{id}', [HomeController::class, 'update_post'])->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/post_page', [AdminController::class, 'post_page'])->middleware('auth');
Route::post('/add_post', [AdminController::class, 'add_post'])->middleware(['auth']);
Route::get('/view_post', [AdminController::class, 'view_post'])->middleware(['auth', 'admin']);
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->middleware(['auth', 'admin']);
Route::get('/admin_edit_post/{id}', [AdminController::class, 'admin_edit_post'])->middleware('auth');
Route::post('/admin_update_post/{id}', [AdminController::class, 'admin_update_post'])->middleware('auth');
