<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Events\sendGlobalNotification;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\SuccesController;
use App\Http\Controllers\WaitingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RegisterAppController;
use App\Http\Controllers\Api\allOrderController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [LoginController::class, 'index'])->name('login');
// Route::get('/', function () {
//     return view('login', [
//         'title' => 'login',
//     ]);
// });

// Route::get('/', [LoginController::class, 'index'])->name('login');
// Route::post('/', [LoginController::class, 'authenticate']);

// Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/main', [HomeController::class, 'index'])->name('main');
    // Route::get('/kantin/home', [HomeController::class, 'kantinHome'])->name('kantin.home');
    // Route::get('/tefa/home', [HomeController::class, 'tefaHome'])->name('tefa.home');
    // Route::get('/dharmawanita/home', [HomeController::class, 'dharmawanitaHome'])->name('dharmawanita.home');
    // Route::get('/kasir/home', [HomeController::class, 'kasirHome'])->name('kasir.home');
});

Route::middleware(['auth', 'user-access:kantin'])->group(function () {
    Route::get('/kantin/home', [HomeController::class, 'kantinHome'])->name('kantin.home');
});

Route::middleware(['auth', 'user-access:tefa'])->group(function () {
    Route::get('/tefa/home', [HomeController::class, 'tefaHome'])->name('tefa.home');
});

Route::middleware(['auth', 'user-access:dharmawanita'])->group(function () {
    Route::get('/dharmawanita/home', [HomeController::class, 'dharmawanitaHome'])->name('dharmawanita.home');
});

Route::middleware(['auth', 'user-access:kasir'])->group(function () {
    Route::get('/kasir/home', [HomeController::class, 'index'])->name('kasir.home');
});

// Route::get('/pusher', [MenuController::class, 'pusher']);
Route::get('send-notif/{name}', function ($name) {
    // event(new sendGlobalNotification($name));
    return  event(new sendGlobalNotification($name));
});

// Route::get('/allOrder', [DetailPenjualanController::class, 'get_all_order']);
Route::get('/allOrder', [orderController::class, 'get_all_order']);
Route::get('/allOrderPembeli', [allOrderController::class, 'allOrderPembeli']);
// Route::delete('/allOrder/{id}', [DetailPenjualanController::class, 'delete_order']);

Route::get('/menu', [MenuController::class, 'index'])->name('menuAll');
Route::get('/menu/create', [MenuController::class, 'create']);
Route::post('/menu', [MenuController::class, 'store']);
Route::get('/menu/{id}/edit', [MenuController::class, 'edit']);
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/kasir', [KasirController::class, 'index']);
Route::post('/kasir', [KasirController::class, 'order']);
Route::get('/kasir/hapussemua/{id}', [KasirController::class, 'hapussemua']);
Route::get('/waiting', [WaitingController::class, 'index']);
Route::get('/succes', [SuccesController::class, 'index']);

Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/autocomplete', [CustomerController::class, 'search'])->name('autocomplete');
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit']);
Route::put('/customer/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);

Route::get('/user', [RegisterAppController::class, 'index']);
Route::post('/user', [RegisterAppController::class, 'store']);
Route::get('/search', [searchController::class, 'index'])->name('search');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
