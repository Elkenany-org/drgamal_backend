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
Route::prefix('images')->group(function () {
    Route::get('/' , [ImageController::class,'index'])->name('images.index');
    Route::get('create' , [ImageController::class, 'create'])->name('images.create');
    Route::post('/store' , [ImageController::class,'store'])->name('images.store');
    Route::get('/edit/{id}' , [ImageController::class,'edit'])->name('images.edit');
    Route::put('/update/{id}' , [ImageController::class,'update'])->name('images.update');
    Route::get('/delete/{id}' , [ImageController::class,'destroy'])->name('images.delete');
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



//category
Route::prefix('category')->group(function () {
    Route::get('/' , [CategoryController::class,'index'])->name('category.index');
    Route::get('/archive' , [CategoryController::class,'archive'])->name('category.archive');
    Route::get('/create' , [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store' , [CategoryController::class, 'store'])->name('category.store');
    Route::get('/show/{id}' , [CategoryController::class,'show'])->name('category.show');
    Route::get('/edit/{id}' , [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update/{id}' , [CategoryController::class,'update'])->name('category.update');
    Route::get('/destroy/{id}' , [CategoryController::class,'soft_delete'])->name('category.soft_delete');
    Route::get('/restore/{id}' , [CategoryController::class,'restore'])->name('category.restore');
    Route::get('/delete/{id}' , [CategoryController::class,'hard_delete'])->name('category.hard_delete');
    Route::get('/search' , [CategoryController::class,'search'])->name('category.search');
    Route::get('/archive_search' , [CategoryController::class,'archive_search'])->name('category.archive_search');
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
