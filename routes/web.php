<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Kyon147\LaravelShopify\Facades\Shopify;
// use App\Http\Controllers\AuthController;
use Osiset\ShopifyApp\Http\Controllers\AuthController;
use App\Http\Controllers\FromUserController;



// Route::get('/get-user', [UserController::class, 'getUser']);
// Route::get('/authenticate', [AuthController::class, 'callback']);

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['verify.shopify'])->name('home');

// Route::group(['prefix' => config('shopify-app.prefix')], function () {
//     Route::get('/', [AuthController::class, 'index'])->name('login');
//     Route::get('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
// });

Route::group(['prefix' => config('shopify-app.prefix')], function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/Formuser', [AuthController::class, 'store'])->name('formuser.store');
    Route::get('/Formuser/create', [AuthController::class, 'create'])->name('formuser.create');
    Route::get('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});