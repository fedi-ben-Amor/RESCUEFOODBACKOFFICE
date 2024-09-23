<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
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
Route::get('/agent/dashboard', function () {
    return view('Dashboard-Agent.Dashboard');
})->name('dashboard-agent');
Route::get('/dashboard', function () {
    return view('Dashboard-Admin.Dashboard');
})->name('Dashboard');
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


Route::get('/category', [CategoryController::class, 'index'])->name('categories.liste');

Route::post('/category/create', [CategoryController::class, 'create'])->name('categories.create');

Route::get('/restaurants', function () {
    return view('Dashboard-Admin.Restaurants');
});
Route::get('/users', function () {
    return view('Dashboard-Admin.UserList');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('Frontoffice.Blogs.index'); // Liste des blogs
Route::get('/blogs/create', [BlogController::class, 'create'])->name('Frontoffice.Blogs.create'); // Formulaire de création
Route::post('/blogs', [BlogController::class, 'store'])->name('Frontoffice.Blogs.store'); // Enregistrer un nouveau blog

Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('Frontoffice.blogs.show'); // Afficher un blog spécifique

Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');


Route::resource('blogs.comments', CommentController::class)->only(['store', 'update', 'destroy']);




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

Route::get('/agent/dashboard/categories', function () {
    return view('Dashboard-Agent.Categories');
})->name('dashboard-agent.my-categories');

Route::get('/agent/dashboard/profiledetails', function () {
    return view('Dashboard-Agent.ProfileDetails');
})->name('dashboard-agent.my-profileDetails');

Route::get('/agent/dashboard/deleteprofile', function () {
    return view('Dashboard-Agent.DeleteProfile');
})->name('dashboard-agent.my-deleteProfile');


Route::get('/NotFound', function () {
    return view('Errors.404-error');
});
Route::fallback(function () {
    return redirect('/NotFound');
});
