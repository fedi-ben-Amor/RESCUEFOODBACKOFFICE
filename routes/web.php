<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FranchiseController;
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

Route::get('/category',[CategoryController::class, 'index'])->name('categories.liste');

Route::post('/category/create', [CategoryController::class, 'create'])->name('categories.create');

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


Route::get('/agent/dashboard/foods', function () {
    return view('Dashboard-Agent.MyProducts');
})->name('dashboard-agent.my-products');

Route::get('/agent/dashboard/orders', function () {
    return view('Dashboard-Agent.Orders');
})->name('dashboard-agent.my-orders');

Route::get('/agent/dashboard/reviews', function () {
    return view('Dashboard-Agent.Reviews');
})->name('dashboard-agent.my-reviews');

Route::get('/agent/dashboard/stock', function () {
    return view('Dashboard-Agent.Stock');
})->name('dashboard-agent.my-stock');


// Franchise
route::get('/agent/dashboard/franchise', [FranchiseController::class, 'index'])->name('dashboard-agent.my-franchise');
Route::get('/agent/dashboard/franchise/{id}', [FranchiseController::class, 'showPLS'])->name('franchises.show');
Route::get('/agent/dashboard/franchise/{id}/edit', [FranchiseController::class, 'edit'])->name('franchises.edit');
Route::put('/agent/dashboard/franchise/{id}', [FranchiseController::class, 'update'])->name('franchises.update');
Route::post('/agent/dashboard/franchise/{id}/update-image', [FranchiseController::class, 'updateImage'])->name('franchises.update.image');


Route::get('/agent/dashboard/categories', function () {
    return view('Dashboard-Agent.Categories');
})->name('dashboard-agent.my-categories');

Route::get('/agent/dashboard/profiledetails', function () {
    return view('Dashboard-Agent.ProfileDetails');
})->name('dashboard-agent.my-profileDetails');

Route::get('/agent/dashboard/deleteprofile', function () {
    return view('Dashboard-Agent.DeleteProfile');
})->name('dashboard-agent.my-deleteProfile');

//Route::resource('franchises', FranchiseController::class);

Route::get('/NotFound', function () {
    return view('Errors.404-error');
});
Route::fallback(function () {
    return redirect('/NotFound');
});





