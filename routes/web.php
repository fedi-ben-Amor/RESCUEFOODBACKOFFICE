<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/SignIn', function () {
    return view('Auth.SignIn');
});
Route::get('/ForgotPassword', function () {
    return view('Auth.ForgotPassword');
});
Route::get('/SignUp', function () {
    return view('Auth.SignUp');
});
Route::get('/Dashboard-Admin', function () {
    return view('Dashboard-Admin.Dashboard');
})->name('Dashboard');
Route::get('/Category', function () {
    return view('Dashboard-Admin.Category');
});
Route::get('/Restaurants', function () {
    return view('Dashboard-Admin.Restaurants');
});
Route::get('/UsersList', function () {
    return view('Dashboard-Admin.UserList');
});
Route::get('/Dashboard-Agent', function () {
    return view('Dashboard-Agent.Dashboard');
});
Route::get('/EditProfile', function () {
    return view('Dashboard-Agent.EditProfile');
})->name('EditProfile');
Route::get('/NotFound', function () {
    return view('Errors.404-error');
});
Route::fallback(function () {
    return redirect('/NotFound');
});