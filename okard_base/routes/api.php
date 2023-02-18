<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::controller(AdminController::class)->group(function () {
    Route::get('getRequests',  'getRequests');
    Route::get('requestDetails/{id}',  'requestDetails');
    Route::delete('deleteRequest/{id}',  'deleteRequest');

    Route::post('saveImageSlide',  'saveImageSlide');
    Route::get('getImageSlides',  'getImageSlides');
    Route::delete('deleteImageSlide/{id}',  'deleteImageSlide');

    Route::post('newCategory',  'newCategory');
    Route::get('getCategories',  'getCategories');
});

Route::controller(UserController::class)->group(function () {
    Route::post('sendRequest',  'sendRequest');
});
