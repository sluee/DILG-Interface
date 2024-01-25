<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IssuanceController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/latest', [IssuanceController::class, 'index']);

    // Route for UserController-Eula's Route
    Route::get('/users', [UserController::class,'index'])->name('user.index');
    Route::get('/users/create', [UserController::class,'create'])->name('user.create');
    Route::post('/users/create', [UserController::class,'store'])->name('user.store');
    Route::get('/users/show/{user}', [UserController::class,'show'])->name('user.show');
    Route::put('/users/activate/{user}', [UserController::class, 'activate'])->name('user.activate');
    Route::put('/users/deactivate/{user}', [UserController::class, 'deactivate'])->name('user.deactivate');

    //Logs Eula's Route
    Route::get('/logs', [LogController::class, 'index'])->name('logs');


});

require __DIR__.'/auth.php';
