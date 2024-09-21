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
Route::get('/login', function () {
    return view('Auth.SignIn');
});
Route::get('/forgetpassword', function () {
    return view('Auth.ForgotPassword');
});
Route::get('/register', function () {
    return view('Auth.SignUp');
});
Route::get('/dashboard', function () {
    return view('Dashboard-Admin.Dashboard');
})->name('Dashboard');

Route::get('/category', function () {
    return view('Dashboard-Admin.Category');
});
Route::get('/restaurants', function () {
    return view('Dashboard-Admin.Restaurants');
});
Route::get('/users', function () {
    return view('Dashboard-Admin.UserList');
});




Route::get('/agent/dashboard', function () {
    return view('Dashboard-Agent.Dashboard');
});
Route::get('/edit-profile', function () {
    return view('Dashboard-Agent.EditProfile');
})->name('EditProfile');
Route::get('/NotFound', function () {
    return view('Errors.404-error');
});
Route::fallback(function () {
    return redirect('/NotFound');
});
