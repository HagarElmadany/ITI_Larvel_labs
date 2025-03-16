<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

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

Route::middleware(['auth'])->get('/posts', [PostsController::class, 'index'])->name('posts.index');


Route::middleware(['auth'])->get('/posts/create', [PostsController::class, 'create'])->name('posts.create');

Route::middleware(['auth'])->post('/posts', [PostsController::class, 'store'])->name('posts.store');

Route::middleware(['auth'])->get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');


Route::middleware(['auth'])->delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');

Route::middleware(['auth'])->get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');

Route::middleware(['auth'])->put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');



Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');



// this code added when we use Inertia
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
