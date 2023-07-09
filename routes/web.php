<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MetaDataPagesController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/', function () {
    return view('home');
});
// Route::get('/error', function () {
//     return view('errors.404');
// })->name('error_page');


//Companies
Route::prefix('companies')->group(function () {
    Route::get('/' , [CompanyController::class,'index'])->name('companies.index');
    Route::get('/create' , [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/store' , [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/edit/{id}' , [CompanyController::class,'edit'])->name('companies.edit');
    Route::post('/update/{id}' , [CompanyController::class,'update'])->name('companies.update');
    Route::get('/delete/{id}' , [CompanyController::class,'destroy'])->name('companies.delete');
});


//About
Route::prefix('about')->group(function () {
    Route::get('/edit' , [AboutController::class,'edit'])->name('About.edit');
    Route::post('/update' , [AboutController::class,'update'])->name('About.update');
});

//Home Images
Route::prefix('image')->group(function () {
    Route::get('/' , [ImageController::class,'index'])->name('images.index');
    Route::get('create' , [ImageController::class, 'create'])->name('images.create');
    Route::post('/store' , [ImageController::class,'store'])->name('images.store');
    Route::get('/edit/{id}' , [ImageController::class,'edit'])->name('images.edit');
    Route::post('/update/{id}' , [ImageController::class,'update'])->name('images.update');
    Route::get('/delete/{id}' , [ImageController::class,'destroy'])->name('images.delete');
});

//News
Route::prefix('news')->group(function () {
    Route::get('/' , [NewsController::class,'index'])->name('News.index');
    Route::get('/archive' , [NewsController::class,'archive'])->name('News.archive');
    Route::get('/create' , [NewsController::class, 'create'])->name('News.create');
    Route::post('/store' , [NewsController::class, 'store'])->name('News.store');
    Route::get('/show/{id}' , [NewsController::class,'show'])->name('News.show');
    Route::get('/edit/{id}' , [NewsController::class,'edit'])->name('News.edit');
    Route::post('/update/{id}' , [NewsController::class,'update'])->name('News.update');
    Route::get('/destroy/{id}' , [NewsController::class,'soft_delete'])->name('News.soft_delete');
    Route::get('/restore/{id}' , [NewsController::class,'restore'])->name('News.restore');
    Route::get('/delete/{id}' , [NewsController::class,'hard_delete'])->name('News.hard_delete');
    Route::get('/search', [NewsController::class, 'search'])->name('News.search');
    Route::get('/archive_search', [NewsController::class, 'archive_search'])->name('News.archive_search');
    Route::get('/title_search', [NewsController::class, 'title_search'])->name('News.title_search');
    Route::get('/archive_title_search', [NewsController::class, 'archive_title_search'])->name('News.archive_title_search');
    Route::post('/searchByDate', [NewsController::class, 'searchByDate'])->name('News.searchByDate');
});

//Achievements
Route::prefix('achievements')->group(function () {
    Route::get('/' , [AchievementController::class,'index'])->name('achievements.index');
    Route::get('/create' , [AchievementController::class, 'create'])->name('achievements.create');
    Route::post('/store' , [AchievementController::class, 'store'])->name('achievements.store');
    Route::get('/edit/{id}' , [AchievementController::class,'edit'])->name('achievements.edit');
    Route::post('/update/{id}' , [AchievementController::class,'update'])->name('achievements.update');
    Route::get('/delete/{id}' , [AchievementController::class,'delete'])->name('achievements.delete');
    Route::get('/search' , [AchievementController::class,'search'])->name('achievements.search');
});


//info
Route::prefix('info')->group(function () {
    Route::get('/' , [InfoController::class,'index'])->name('info.index');
    Route::get('/archive' , [InfoController::class,'archive'])->name('info.archive');
    Route::get('create' , [InfoController::class, 'create'])->name('info.create');
    Route::post('/store' , [InfoController::class,'store'])->name('info.store');
    Route::get('/edit/{id}' , [InfoController::class,'edit'])->name('info.edit');
    Route::put('/update/{id}' , [InfoController::class,'update'])->name('info.update');
    Route::get('/soft_delete/{id}' , [InfoController::class,'soft_delete'])->name('info.soft_delete');
    Route::get('/restore/{id}' , [InfoController::class,'restore'])->name('info.restore');
    Route::get('/hard_delete/{id}' , [InfoController::class,'restore'])->name('info.hard_delete');
    Route::get('/search' , [InfoController::class,'search'])->name('info.search');
    Route::get('/archive_search' , [InfoController::class,'archive_search'])->name('info.archive_search');
});

//contactus
Route::prefix('contactus')->group(function () {
    Route::get('/' , [ContactUsController::class,'index'])->name('contactus.index');
    Route::get('/archive' , [ContactUsController::class,'archive'])->name('contactus.archive');
    Route::get('/show/{id}' , [ContactUsController::class,'show'])->name('contactus.show');
    Route::get('/destroy/{id}' , [ContactUsController::class,'soft_delete'])->name('contactus.soft_delete');
    Route::get('/restore/{id}' , [ContactUsController::class,'restore'])->name('contactus.restore');
    Route::get('/delete/{id}' , [ContactUsController::class,'hard_delete'])->name('contactus.hard_delete');
    Route::get('/search' , [ContactUsController::class,'search'])->name('contactus.search');
    Route::get('/archive_search' , [ContactUsController::class,'archive_search'])->name('contactus.archive_search');
});

//meta data
Route::prefix('metadata')->group(function () {
    Route::get('/' , [MetaDataPagesController::class,'index'])->name('metadata.index');
    Route::get('/create' , [MetaDataPagesController::class, 'create'])->name('metadata.create');
    Route::post('/store' , [MetaDataPagesController::class, 'store'])->name('metadata.store');
    Route::get('/edit/{id}' , [MetaDataPagesController::class,'edit'])->name('metadata.edit');
    Route::post('/update/{id}' , [MetaDataPagesController::class,'update'])->name('metadata.update');
    Route::get('/delete/{id}' , [MetaDataPagesController::class,'delete'])->name('metadata.delete');
});







//Jobs
Route::prefix('job')->group(function () {
    Route::get('/' , [JobController::class,'index'])->name('Jobs.index');
    Route::get('/archive' , [JobController::class,'archive'])->name('Jobs.archive');
    Route::get('/create' , [JobController::class, 'create'])->name('Jobs.create');
    Route::post('/store' , [JobController::class, 'store'])->name('Jobs.store');
    Route::get('/edit/{id}' , [JobController::class,'edit'])->name('Jobs.edit');
    Route::post('/update/{id}' , [JobController::class,'update'])->name('Jobs.update');
    Route::get('/destroy/{id}' , [JobController::class,'soft_delete'])->name('Jobs.soft_delete');
    Route::get('/restore/{id}' , [JobController::class,'restore'])->name('Jobs.restore');
    Route::get('/delete/{id}' , [JobController::class,'hard_delete'])->name('Jobs.hard_delete');
    Route::get('/search', [JobController::class, 'search'])->name('Jobs.search');
    Route::get('/archive_search', [JobController::class, 'archive_search'])->name('Jobs.archive_search');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('register_form', [UserController::class, 'register_form'])->name('register_form');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('update_role/{id}', [UserController::class, 'update_role'])->name('update_role');
});
