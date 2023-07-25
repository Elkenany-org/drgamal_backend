<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiNewsController;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiAboutController;
use App\Http\Controllers\Api\ApiImageController;
use App\Http\Controllers\Api\ApiContactUsController;
use App\Http\Controllers\Api\ApiCompanyController;
use App\Http\Controllers\Api\ApiHomeController;
use App\Http\Controllers\Api\ApiAchievementsController;

use App\Models\News;
use App\Models\Job;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Info;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//news
Route::prefix('news')->group(function () {
    Route::get('/' , [ApiNewsController::class,'index']);
    Route::get('/show/{id}' , [ApiNewsController::class,'show']);
    Route::get('/search', [ApiNewsController::class, 'search']);
});

//Achievements
Route::prefix('achievements')->group(function () {
    Route::get('/' , [ApiAchievementsController::class,'index']);

});

//jobs
Route::prefix('jobs')->group(function () {
    Route::get('/' , [ApiJobController::class,'index']);
    Route::get('/show/{id}' , [ApiJobController::class,'show']);
    Route::get('/search', [ApiJobController::class, 'search']);
});


//about
Route::prefix('about')->group(function () {
    Route::get('/show' , [ApiAboutController::class,'show']);
});

//Images
Route::prefix('image')->group(function () {
    Route::get('/dr_image' , [ApiImageController::class,'dr_image']);
    Route::get('/maincompany_image' , [ApiImageController::class,'maincompany_image']);
    Route::get('/secondarycompanies_image' , [ApiImageController::class,'secondarycompanies_image']);
    Route::get('/achievementspage_image' , [ApiImageController::class,'achievementspage_image']);
    Route::get('/newspage_image' , [ApiImageController::class,'newspage_image']);
});


//infos
Route::prefix('companies')->group(function () {
    Route::get('/' , [ApiCompanyController::class,'index']);
});

//contactus
Route::post('contactus/store' , [ApiContactUsController::class,'store']);

//home
Route::get('home/all' , [ApiHomeController::class,'home']);