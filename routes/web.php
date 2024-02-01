<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// routes/web.php

use App\Http\Controllers\BlogController;

// routes/web.php

Route::get('/blog/create', [BlogController::class, 'showCreateForm'])->name('blog.create');

Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

Route::get('/viewall', [BlogController::class, 'viewAll'])->name('blog.viewall');

Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');

Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blog.update');

Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// routes/web.php

use App\Http\Controllers\FeatureController;

Route::get('/features/create', [FeatureController::class, 'create'])->name('features.create');
Route::post('/features/store', [FeatureController::class, 'store'])->name('features.store');

Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

// routes/web.php

Route::get('/user/profile', 'UserProfileController@profile')->name('user.profile');

// routes/web.php
Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');

Route::get('/blogs', [BlogController::class, 'index']);

// routes/web.php

use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'welcome']);

// routes/web.php
Route::get('/blog/{id}', [FrontendController::class, 'showBlogDetails'])->name('blog.details');



