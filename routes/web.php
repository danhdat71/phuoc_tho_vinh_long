<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\IconBoxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UtilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::group([
    // 'middleware' => ['auth_admin']
], function () {
    //Slider
    Route::get('/slider', [SliderController::class, 'index']);
    Route::post('/slider', [SliderController::class, 'store']);
    Route::post('/slider/status', [SliderController::class, 'setStatus']);
    Route::get('/slider/{id}/delete', [SliderController::class, 'destroy']);
    //Contents
    Route::get('/content', [ContentController::class, 'index']);
    Route::post('/content/title/update', [ContentController::class, 'updateTitle']);
    Route::post('/content/image/update', [ContentController::class, 'updateImage']);
    Route::post('/content/status/update', [ContentController::class, 'setStatus']);
    Route::post('/content/main-content/update', [ContentController::class, 'updateMainContent']);
    //Util
    Route::get('/util', [UtilController::class, 'index']);
    Route::post('/util', [UtilController::class, 'store']);
    Route::get('/util/{util_id}/delete', [UtilController::class, 'destroy']);
    Route::get('/util/{util_id}/get', [UtilController::class, 'show']);
    Route::post('/util/update', [UtilController::class, 'update']);
    Route::post('/util/status/update', [UtilController::class, 'setStatus']);
    //Icon box
    Route::get('/icon-box', [IconBoxController::class, 'index']);
    Route::post('/icon-box', [IconBoxController::class, 'update']);
    //Product
    Route::get('/product', [ProductController::class, 'index']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::post('/product/{product_id}/get', [ProductController::class, 'show']);
    Route::get('/product/{product_id}/delete', [ProductController::class, 'show']);
    //Logout
    Route::get('/logout', [AuthController::class, 'logout']);
});