<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ImageSlidesController;
use App\Http\Controllers\UserEnquiryController;
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

    Route::post('newCategory',  'newCategory');
    Route::get('getCategories',  'getCategories');
    Route::delete('deleteCategory/{id}',  'deleteCategory');

    Route::get('getContact',  'getContact');
    Route::post('updateContact',  'updateContact');

    Route::post('isVisitor',  'isVisitor');
});

// Route::post('isVisitor', [UserController::class, 'isVisitor']);

Route::apiResource('blog', BlogController::class);
Route::apiResource('message', MessageController::class);
Route::apiResource('portfolio', PortfolioController::class);
Route::apiResource('imageSlides', ImageSlidesController::class);
Route::apiResource('enquiry', UserEnquiryController::class);
