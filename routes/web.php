<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Admin', function () {
    return view('Admin.index');
})->middleware(['auth', 'role:Admin'])->name('Admin');

Route::get('/Awner', function () {
    return view('Awner.index');
})->middleware(['auth', 'role:Awner'])->name('Awner');

Route::get('/Operatuer', function () {
    return view('Operatuer.index');
})->middleware(['auth', 'role:Operatuer'])->name('Operatuer');

Route::post('/add-plan', [PlanController::class, 'store'])->middleware('Aute', 'role:Admin')->name('addPlan');
Route::get('/ChosePlan', [PlanController::class, 'index'])->middleware('Aute', 'role:Awner')->name('ChosePlan');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
