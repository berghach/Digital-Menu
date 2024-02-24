<?php

// use App\Models\User;

use App\Http\Controllers\AwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurentController;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Admin', function () {
    return view('Admin.index');
})->middleware(['auth', 'role:Admin'])->name('Admin');
Route::delete('/plans/{plan}', [PlanController::class, 'destroy'])->middleware(['auth', 'role:Admin'])->name('plans.destroy');




Route::get('/Operatuer', function () {
    return view('Operatuer.index');
})->middleware(['auth', 'role:Operatuer'])->name('Operatuer');

Route::post('/add-plan', [PlanController::class, 'store'])->middleware('auth', 'role:Admin')->name('addPlan');
Route::get('/Awner', [PlanController::class, 'index'])->middleware('auth', 'role:Awner')->name('Awner');
Route::get('/Gestion-du-plans', [PlanController::class, 'index'])->middleware('auth', 'role:Admin')->name('Gestion-du-plans');
Route::get('/plans/{plan}/edit', [PlanController::class, 'edit'])->middleware('auth', 'role:Admin')->name('plans.edit');
Route::put('/plans/{plan}', [PlanController::class, 'update'])->middleware('auth', 'role:Admin')->name('plans.update');

// Route::get('/yoAwner', function () {
//     return view('Awner.createResto');
// })->middleware(['auth', 'role:Awner'])->name('yoAwner');
Route::get('/yoAwner', [RestaurentController::class, 'index'])->middleware('auth', 'role:Awner')->name('yoAwner');
Route::post('/CreateRestaurent', [RestaurentController::class, 'store'])->middleware('auth', 'role:Awner')->name('CreateRestaurent');

Route::get('/operatuerForm', [UserController::class, 'index'])->middleware('auth', 'role:Awner')->name('operatuerForm');
Route::post('/AddOperatuer', [UserController::class, 'store'])->middleware('auth', 'role:Awner')->name('AddOperatuer');
Route::get('/GestionOfOPerar', [AwnerController::class, 'index'])->middleware('auth', 'role:Awner')->name('GestionOfOPerar');
Route::post('/operatorsPlan', [PlanController::class, 'assignPlan'])->middleware('auth', 'role:Awner')->name('operatorsPlan');







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
