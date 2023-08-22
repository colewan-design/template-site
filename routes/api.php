<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\BasketItemsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\displayBasketController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MerchandizerController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['middleware' => ['web', 'auth:sanctum']], function() {
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::prefix('/Basket_Items')->group(function($route){
        Route::post('/basket-items-store', [BasketItemsController::class, 'store'])->middleware(['ability:basketItems-crud,basketItems-create']);
        Route::post('/basket-items-update/{id}', [BasketItemsController::class, 'update'])->middleware(['ability:basketItems-crud,basketItems-update']);
        Route::delete('/basket-items-delete/{id}', [BasketItemsController::class, 'destroy'])->middleware(['ability:basketItems-crud,basketItems-delete']);
    });
    Route::prefix('/Basket')->group(function($route){
        Route::post('/basket-store', [BasketController::class, 'store'])->middleware(['ability:baskets-crud,baskets-create']);
        Route::post('/basket-update/{id}', [BasketController::class, 'update'])->middleware(['ability:baskets-crud,baskets-update']);
        Route::delete('/basket-delete/{id}', [BasketController::class, 'destroy'])->middleware(['ability:baskets-crud,baskets-delete']);
    });
    Route::prefix('/Additional')->group(function($route){
        Route::post('/additional-store', [AdditionalController::class, 'store'])->middleware(['ability:additional-crud,additional-create']);
        Route::post('/additional-update/{id}', [AdditionalController::class, 'update'])->middleware(['ability:additional-crud,additional-update']);
        Route::delete('/additional-delete/{id}', [AdditionalController::class, 'destroy'])->middleware(['ability:additional-crud,additional-delete']);
    });
}); 

Route::prefix('/Merchandizer')->group(function($route){
    Route::get('/index', [MerchandizerController::class, 'index']);
    Route::post('/merchandizer-store', [MerchandizerController::class, 'store']);
    Route::post('/merchandizer-update/{id}', [MerchandizerController::class, 'update']);
    Route::delete('/merchandizer-delete/{id}', [MerchandizerController::class, 'destroy']);
    Route::get('/search/merchandizer',  [MerchandizerController::class, 'search']);
});


Route::post('/subscribe', [CustomersController::class, 'subscribeCustomer']);

Route::prefix('/Basket_Items')->group(function($route){
    Route::get('/index', [BasketItemsController::class, 'index']);
    Route::get('/user-dashboard-items', [BasketItemsController::class, 'userDashboardItems']);
    Route::post('/basket-items-store', [BasketItemsController::class, 'store']);
    Route::post('/basket-items-update/{id}', [BasketItemsController::class, 'update']);
    Route::delete('/basket-items-delete/{id}', [BasketItemsController::class, 'destroy']);
    Route::get('/search/basket-items',  [BasketItemsController::class, 'search']);
});

Route::prefix('/Cart')->group(function($route){
    Route::get('/index', [CartController::class, 'index']);
    Route::post('/cart-store', [CartController::class, 'store']);
    Route::post('/cart-update/{id}', [CartController::class, 'update']);
    Route::delete('/cart-delete/{id}', [CartController::class, 'destroy']);
    Route::get('/search/cart',  [CartController::class, 'search']);
});

Route::prefix('/Order')->group(function($route){
    Route::get('/index', [OrderController::class, 'index']);
    Route::post('/order-store', [OrderController::class, 'store']);
    Route::post('/order-update/{id}', [OrderController::class, 'update']);
    Route::delete('/order-delete/{id}', [OrderController::class, 'destroy']);
    Route::get('/search/order',  [OrderController::class, 'search']);
});

Route::prefix('/Basket')->group(function($route){
    Route::get('/index', [BasketController::class, 'index']);
    Route::post('/basket-store', [BasketController::class, 'store']);
    Route::post('/basket-update/{id}', [BasketController::class, 'update']);
    Route::delete('/basket-delete/{id}', [BasketController::class, 'destroy']);
    Route::get('/get-items', [BasketController::class, 'getItems']);
    Route::get('/search/basket',  [BasketController::class, 'search']);
});
// Route::group(['middleware' => ['web']], function() {
    Route::post('/subscribe', [CustomersController::class, 'subscribeCustomer']);

    Route::prefix('/Basket_Items')->group(function($route){
        Route::get('/index', [BasketItemsController::class, 'index']);
        // Route::post('/basket-items-store', [BasketItemsController::class, 'store']);
        // Route::post('/basket-items-update/{id}', [BasketItemsController::class, 'update']);
        // Route::delete('/basket-items-delete/{id}', [BasketItemsController::class, 'destroy']);
        Route::get('/search/basket-items',  [BasketItemsController::class, 'search']);
    });

    Route::prefix('/Basket')->group(function($route){
        Route::get('/index', [BasketController::class, 'index']);
        // Route::post('/basket-store', [BasketController::class, 'store']);
        // Route::post('/basket-update/{id}', [BasketController::class, 'update']);
        // Route::delete('/basket-delete/{id}', [BasketController::class, 'destroy']);
        Route::get('/get-items', [BasketController::class, 'getItems']);
        Route::get('/search/basket',  [BasketController::class, 'search']);
    });

    Route::prefix('/Additional')->group(function($route){
        Route::get('/index', [AdditionalController::class, 'index']);
        // Route::post('/additional-store', [AdditionalController::class, 'store']);
        // Route::post('/additional-update/{id}', [AdditionalController::class, 'update']);
        // Route::delete('/additional-delete/{id}', [AdditionalController::class, 'destroy']);
        Route::get('/search/additional',  [AdditionalController::class, 'search']);
    });

    Route::prefix('/Display_Basket')->group(function($route){
        Route::get('/index', [displayBasketController::class, 'index']);
    });

    Route::post('/login', [AuthController::class, 'userLogin']);
    Route::post('/logout', [AuthController::class, 'userLogout']);

    /** libraries */
    Route::prefix('/lib')->group(function($route) {
        Route::get('/brgy', [LibraryController::class, 'getBarangays']);
        Route::get('/muncity', [LibraryController::class, 'getMunCity']);
        Route::get('/province', [LibraryController::class, 'getProvince']);
    });
// });