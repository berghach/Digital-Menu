<?php

// use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AwnerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurentController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

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
// $isOwner = true;


Route::get('/Menues', [HomeController::class, 'index'])->middleware('auth', 'role:Awner')->name('Menues');
Route::get('/itemForm', [ItemsController::class, 'index'])->middleware('auth', 'role:Awner')->name('itemForm');
Route::post('/addItem', [ItemsController::class, 'store'])->middleware('auth', 'role:Awner')->name('addItem');
Route::get('/allItems/{menu_id}', [ItemsController::class, 'getAllItems'])->middleware('auth', 'role:Awner')->name('allItems');
// Route::get('/generateQRCode/{menu_id}', [ItemsController::class, 'generateQRCode'])->middleware('auth', 'role:Awner')->name('generateQRCode');
// Route::get('/generateQRCode/{menu_id}', [ItemsController::class, 'generateQRCode'])->name('generateQRCode');
// Route::get('/generateQRCode/{menu_id}', [ItemsController::class, 'generateQRCode'])->name('generateQRCode');
Route::post('/assignPermissionsToOperator', [UserController::class, 'assignPermissionsToOperator'])->middleware('auth', 'role:Awner')->name('assignPermissionsToOperator');
Route::get('/assign-permissions', [UserController::class, 'showAssignPermissionsForm'])->name('assignPermissionsForm');


Route::get('/user-plan', [PlanController::class, 'userOfresinPlan'])->name('user.plan');



// Change the route name to a unique name
Route::get('/items', [ItemsController::class, 'getAllItemsOfworkers'])->middleware('auth', 'role:Awner')->name('items.getAllItems');
Route::get('/awners/{id}/edit', [AwnerController::class, 'edit'])->middleware('auth', 'role:Awner')->name('awners.edit');
Route::put('/awners/{id}', [AwnerController::class, 'update'])->middleware('auth', 'role:Awner')->name('awners.update');
Route::delete('/awners/{id}', [AwnerController::class, 'destroy'])->middleware('auth', 'role:Awner')->name('awners.destroy');




Route::middleware(['auth'])->group(function () {
    Route::get('/menusform', [MenuController::class, 'index'])->name('menusform');
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/items/{menu}', [ItemsController::class, 'index'])->name('items.index');
Route::post('/items', [ItemsController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ItemsController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemsController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemsController::class, 'destroy'])->name('items.destroy');
    
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
