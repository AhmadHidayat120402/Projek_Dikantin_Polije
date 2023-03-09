<?php

// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AndroidMenu;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\DetailPenjualanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('/login', [LoginApiController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/apimenu', [
    AndroidMenu::class,
    'apimenu'
]);

Route::get('/menus', [MenuApiController::class, 'index']);
Route::post('/menus', [MenuApiController::class, 'store']);
Route::get('/menus/{id}', [MenuApiController::class, 'show']);
Route::put('/menus/{id}', [MenuApiController::class, 'update']);
Route::delete('/menus/{id}', [MenuApiController::class, 'destroy']);
Route::get('/allDataa', [PenjualanController::class, 'allDataa']);

// Route::get('/customer', [CustomerApiController::class, 'index']);

// ndek sini di route ini


Route::get('/allData', [PenjualanController::class, 'allData']);
Route::get('/allOrder', [DetailPenjualanController::class, 'get_all_order']);


// Route::get('/waiting-list', [PenjualanController::class, 'allData']);
Route::post('/penjualan/save', [PenjualanController::class, 'store'])->name('penjualan.save');
Route::post('/penjualan/tambahJumlah', [PenjualanController::class, 'tambahJumlah'])->name('penjualan.tambahJumlah');
Route::post('/penjualan/kurangJumlah', [PenjualanController::class, 'kurangJumlah'])->name('penjualan.kurangJumlah');
Route::post('/penjualan/hapusItem', [PenjualanController::class, 'hapusItem'])->name('penjualan.hapusItem');
Route::get('/cart/{id}', [DetailPenjualanController::class, 'get_all'])->name('cart.all');
Route::get('/pusher/{id}', [DetailPenjualanController::class, 'get_pusher']);
Route::post('/cart/save', [DetailPenjualanController::class, 'store'])->name('cart.save');


// semua route disini bisa diakses di postman tergantung kegunaaan, contoh disini buat route /customer/get-by-id-customer yg dia panggil controller dengan fungsi showByIdCustmer
Route::get('/customer/get-by-id-customer', [CustomerApiController::class, 'showByIdCustomer']);
