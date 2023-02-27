<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
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
    Route::post('admin/login',  'login');
    Route::post('admin/passwordChange',  'passwordChange');
    Route::get('admin/getAccount/{id}',  'getAccount');

    Route::get('getRequests',  'getRequests');
    Route::get('requestDetails/{id}',  'requestDetails');
    Route::delete('deleteRequest/{id}',  'deleteRequest');

    Route::post('saveImageSlide',  'saveImageSlide');
    Route::delete('deleteImageSlide/{id}',  'deleteImageSlide');

    Route::post('newCategory',  'newCategory');
    Route::get('getCategories',  'getCategories');
    Route::delete('deleteCategory/{id}',  'deleteCategory');
});


Route::get('getImageSlides', [AdminController::class, 'getImageSlides']);
Route::controller(UserController::class)->group(function () {
    Route::post('sendRequest',  'sendRequest');
    Route::post('isVisitor',  'isVisitor');
});


Route::apiResource('blog', BlogController::class);
