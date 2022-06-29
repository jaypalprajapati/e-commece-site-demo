<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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
     return view('dashboard'); 


       
 });
 Route::get('/filterProduct', [HomeController::class, 'filterProduct'])->name('filterProduct');

//Route::get('/',[loginController :: class, 'superadmin']);
//Route::view('login','login'); 

Route::get('/',[HomeController::class, 'dashboard']);
Route::get('/create',[HomeController::class, 'create'])->name('create');
Route::post('/store',[HomeController::class, 'store'])->name('store');

// Route::post('/', ['HomeController::class@store']);
//Route::get('/admin', [LoginnController::class, 'superadmin'])->name('admin');
//Route::view('admin', 'admin');

// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
// Route::get('registration', [AuthController::class, 'registration'])->name('register');
// Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
// Route::get('dashboard', [AuthController::class, 'dashboard']); 
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('auth/postLogin', [AuthController::class, 'postLogin'])->name('auth.postLogin');
// Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');

 Route::resource('admin',AdminController::class);
 Route::resource('category',CategoryController::class);
 Route::resource('product',ProductController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

Route::get('product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');

Route::get('product/restore-all', [ProductController::class, 'restoreAll'])->name('product.restoreAll');

Route::get('admin/restore/{id}', [AdminController::class, 'restore'])->name('admin.restore');

Route::get('admin/restore-all', [AdminController::class, 'restoreAll'])->name('admin.restoreAll');

Route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');

Route::get('category/restore-all', [CategoryController::class, 'restoreAll'])->name('category.restoreAll');

