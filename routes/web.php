<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

    Route::resource('tickets', TicketController::class);
    Route::resource('assigned', AgentController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('logs', LogController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    
    Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);
    
    // Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
    // Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    // Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    
    Route::post('/tickets/{ticket}/agent/', [AgentController::class, 'store'])->name('agents.store');
    Route::post('/tickets/{ticket}/status/', [StatusController::class, 'store'])->name('statuses.store');
    Route::post('/tickets/{ticket}/comment/', [CommentController::class, 'store'])->name('comments.store');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
