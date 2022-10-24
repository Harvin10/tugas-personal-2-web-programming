<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [UserController::class, 'login']);

Route::get('/login',  [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/register', [UserController::class, 'register']);

Route::post('/register', [UserController::class, 'inputRegister']);

Route::get('/resetpassword', [UserController::class, 'reset']);

Route::post('/resetpassword', [UserController::class, 'resetPassword']);

Route::get('/welcome', [UserController::class, 'welcome']);
