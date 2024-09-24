<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Route::get('/signup', [RegisterController::class, 'showSignUpForm']);
Route::get('/signin', [LoginController::class, 'showSignInForm']);
Route::get('/agent/dashboard', function () { return view('Dashboard-Agent.Dashboard');})->name('dashboard-agent');
// Display the form to create a new food item
Route::get('/agent/dashboard/foods/create', [FoodController::class, 'index'])->name('food.create');

Route::get('/agent/dashboard/foods', [FoodController::class, 'listeOfFoodsByRestaurant'])->name('dashboard-agent.my-products');

Route::post('/agent/dashboard/foods/create', [FoodController::class, 'create'])->name('food.store');

Route::post('/signup', [RegisterController::class, 'register'])->name('signup');
Route::post('/signin', [LoginController::class, 'login'])->name('signin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', function () {  return view('Frontoffice.home');});
Route::get('/categories', [CategoryController::class, 'categoriesListeFrontOffice'])->name('categorieListe');
Route::get('/{category}/foods', function ($category) {  return view('Frontoffice.categories.foodscategorie',['category' => $category]);});
Route::get('/foodmarkets', function () {  return view('Frontoffice.foods.allmarkets');});
Route::get('/restaurant/{restaurant}/foods', function ($restaurant) {  return view('Frontoffice.foods.foods',['restaurant' => $restaurant]);});




Route::get('/forgetpassword', function () {
    return view('Auth.ForgotPassword');
}); 
Route::get('/dashboard', function () {
    return view('Dashboard-Admin.Dashboard');
})->name('Dashboard');

Route::get('/category', [CategoryController::class, 'index'])->name('categories.liste');
Route::post('/category/create', [CategoryController::class, 'create'])->name('categories.create');

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::put('/restaurants/{id}/status', [RestaurantController::class, 'updateStatus'])->name('restaurants.updateStatus');
Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy');


Route::get('/users', function () {
    return view('Dashboard-Admin.UserList');
});






Route::get('/edit-profile', function () {
    return view('Dashboard-Agent.EditProfile');
})->name('EditProfile');




Route::get('/agent/dashboard/orders', function () {
    return view('Dashboard-Agent.Orders');
})->name('dashboard-agent.my-orders');

Route::get('/agent/dashboard/reviews', function () {
    return view('Dashboard-Agent.Reviews');
})->name('dashboard-agent.my-reviews');

Route::get('/agent/dashboard/stock', function () {
    return view('Dashboard-Agent.Stock');
})->name('dashboard-agent.my-stock');

Route::get('/agent/dashboard/categories', function () {
    return view('Dashboard-Agent.Categories');
})->name('dashboard-agent.my-categories');

Route::get('/agent/dashboard/profiledetails', function () {
    return view('Dashboard-Agent.ProfileDetails');
})->name('dashboard-agent.my-profileDetails');

Route::get('/agent/dashboard/deleteprofile', function () {
    return view('Dashboard-Agent.DeleteProfile');
})->name('dashboard-agent.my-deleteProfile');



Route::get('/create-new-restaurant', function () {
    return view('Dashboard-Agent.Restaurant.create');
});

Route::post('/resto/store', [RestaurantController::class, 'store'])->name('resto.store');







Route::get('/NotFound', function () {
    return view('Errors.404-error');
});
Route::fallback(function () {
    return redirect('/NotFound');
});