<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
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

Route::resource('tickets', TicketController::class);
Route::resource('assigned', AgentController::class);
Route::resource('categories', CategoryController::class);

Route::get('/', [TicketController::class, 'index'])->middleware(['auth', 'verified']);

Route::post('/tickets/{ticket}/agent/', [AgentController::class, 'store'])->name('agents.store');
Route::post('/tickets/{ticket}/status/', [StatusController::class, 'store'])->name('statuses.store');
Route::post('/tickets/{ticket}/comment/', [CommentController::class, 'store'])->name('comments.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
