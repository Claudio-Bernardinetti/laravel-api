<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Models\Project;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/mailable', function () {
    $lead = App\Models\Lead::find(1);

    //    return new App\Mail\NewLeadEmail($lead);
    return new App\Mail\NewLeadEmailMd($lead);
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    /* Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('posts.show'); */

    Route::resource('projects', ProjectController::class);
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
