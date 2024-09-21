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
});
Route::get('/UsersList', function () {
    return view('Dashboard-Admin.UserList');
});
Route::get('/Dashboard-Agent', function () {
    return view('Dashboard-Agent.Dashboard');
});
Route::get('/Dashboard-Agent/MyProducts', function () {
    return view('Dashboard-Agent.MyProducts');
})->name('dashboard-agent.my-products');

Route::get('/Dashboard-Agent/Orders', function () {
    return view('Dashboard-Agent.Orders');
})->name('dashboard-agent.my-orders');

Route::get('/Dashboard-Agent/Reviews', function () {
    return view('Dashboard-Agent.Reviews');
})->name('dashboard-agent.my-reviews');

Route::get('/Dashboard-Agent/Stock', function () {
    return view('Dashboard-Agent.Stock');
})->name('dashboard-agent.my-stock');

Route::get('/Dashboard-Agent/Categories', function () {
    return view('Dashboard-Agent.Categories');
})->name('dashboard-agent.my-categories');

Route::get('/Dashboard-Agent/ProfileDetails', function () {
    return view('Dashboard-Agent.ProfileDetails');
})->name('dashboard-agent.my-profileDetails');

Route::get('/Dashboard-Agent/DeleteProfile', function () {
    return view('Dashboard-Agent.DeleteProfile');
})->name('dashboard-agent.my-deleteProfile');