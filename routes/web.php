<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\RestaurentController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\OrderController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataFPController;

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


Auth::routes(['reset' => true]);
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Auth::routes(['verify' => true]);
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


Route::get('/', function () {  return view('Frontoffice.home');});

Route::get('/signup', [RegisterController::class, 'showSignUpForm']);
Route::get('/signin', [LoginController::class, 'showSignInForm']);
Route::post('/signup', [RegisterController::class, 'register'])->name('signup');
Route::post('/signupClient', [RegisterController::class, 'registerClient'])->name('signupClient');
Route::post('/signin', [LoginController::class, 'login'])->name('signin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/contact', function () {return view('Frontoffice.contact.contact');})->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


//ADMIN ROUTES
Route::middleware(['auth', 'isAdmin', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('Dashboard');
    Route::get('/restaurants', [RestaurentController::class, 'indexAdmin'])->name('admin.restaurants');
    
    Route::patch('/restaurants/{id}/update-status', [RestaurentController::class, 'updateStatus'])->name('restaurants.updateStatus');
    Route::delete('/restaurants/{id}', [RestaurentController::class, 'destroy'])->name('restaurants.destroy');
    Route::get('/restaurantsAdmin/{id}', [RestaurentController::class, 'showAdmin'])->name('restaurants.showAdmin');
    Route::get('/contactList', [ContactController::class, 'index'])->name('contactList');
    Route::post('/contacts/{id}/approve', [ContactController::class, 'approve'])->name('contacts.approve');
    Route::post('/contacts/{id}/reject', [ContactController::class, 'reject'])->name('contacts.reject');
    // Routes dans web.php
    Route::get('/admin/users/{role}', [UserController::class, 'index'])->name('Dashboard-Admin.UserList');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('user.delete');

    //Categories
    Route::get('/category', [CategoryController::class, 'index'])->name('categories.liste');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::post('/category/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
});
//AGENT ROUTES
Route::middleware(['auth', 'isAgent', 'verified'])->group(function () {
    Route::get('/agent/dashboard/reviews', [ReviewsController::class, 'index'])->name('dashboard-agent.my-reviews');
    Route::resource('agent/dashboard/restaurents', RestaurentController::class)->names([
        'index' => 'restaurents.index',
        'create' => 'restaurents.create',
        'store' => 'restaurents.store',
        'show' => 'restaurents.show',
        'edit' => 'restaurents.edit',
        'update' => 'restaurents.update',
        'destroy' => 'restaurents.destroy',
    ]);
    
    // Route::get('/agent/dashboard', function () { return view('Dashboard-Agent.Dashboard');})->name('dashboard-agent');
    Route::get('/agent/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/agent/dashboard/carbon', [DataFPController::class, 'showCarbon']);

    Route::get('/agent/dashboard/foods/create', [FoodController::class, 'index'])->name('food.create');
   


    Route::get('/foods/{id}/edit', [FoodController::class, 'edit'])->name('food.edit');
    Route::put('/foods/{id}', [FoodController::class, 'update'])->name('food.update');
    Route::get('/agent/dashboard/foods/create', [FoodController::class, 'index'])->name('food.create');
    Route::get('/agent/dashboard/foods', [FoodController::class, 'listeOfFoodsByRestaurant'])->name('dashboard-agent.my-products');
    Route::delete('/agent/dashboard/foods/delete/{id}', [FoodController::class, 'destroy'])->name('food.delete');
    Route::post('/agent/dashboard/foods/create', [FoodController::class, 'create'])->name('food.store');
    //franchiseH
    Route::get('/agent/dashboard/franchise', [FranchiseController::class, 'index'])->name('dashboard-agent.my-franchise');
    Route::get('/agent/dashboard/franchise/create', [FranchiseController::class, 'create'])->name('franchises.create');
    Route::get('/agent/dashboard/franchise/{id}', [FranchiseController::class, 'showPLS'])->name('franchises.show');
    Route::get('/agent/dashboard/franchise/{id}/edit', [FranchiseController::class, 'edit'])->name('franchises.edit');
    Route::put('/agent/dashboard/franchise/{id}', [FranchiseController::class, 'update'])->name('franchises.update');
    Route::post('/agent/dashboard/franchise/{id}/update-image', [FranchiseController::class, 'updateImage'])->name('franchises.update.image');
    Route::post('/agent/dashboard/franchise', [FranchiseController::class, 'store'])->name('franchises.store');
    Route::delete('/agent/dashboard/franchise/delete/{id}', [FranchiseController::class, 'destroy'])->name('franchises.delete');

    // StocksH
    Route::get('/agent/dashboard/stock', [StockController::class, 'index'])->name('dashboard-agent.my-stock');
    Route::get('/agent/dashboard/stocks/create', [StockController::class, 'create'])->name('stocks.create');
    Route::post('/agent/dashboard/stocks', [StockController::class, 'store'])->name('stocks.store');
    Route::get('/agent/dashboard/stocks/{id}', [StockController::class, 'show'])->name('stocks.show'); // Add this line
    Route::get('/agent/dashboard/stocks/{id}/edit', [StockController::class, 'edit'])->name('stocks.edit');
    Route::put('/agent/dashboard/stocks/{id}', [StockController::class, 'update'])->name('stocks.update');
    Route::delete('/agent/dashboard/stocks/{id}', [StockController::class, 'destroy'])->name('stocks.destroy');
    Route::post('/agent/dashboard/stocks/{id}/update-image', [StockController::class, 'updateImage'])->name('stocks.update.image');
    Route::get('/stocks/search', [StockController::class, 'search'])->name('stocks.search');
    //Blogs
    Route::get('/agent/dashboard/blogs', [BlogController::class, 'agentBlogs'])->name('dashboard-agent.blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('Frontoffice.Blogs.create');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('Frontoffice.Blogs.edit');
    Route::get('/blogdetail/{id}', [BlogController::class, 'detail'])->name('blogs.detail');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('Frontoffice.Blogs.destroy');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('Frontoffice.Blogs.update'); 
    //Orders
    Route::get('/orderList',  [OrderController::class, 'index'])->name('orders.index');

  
});

Route::get('/blogs', [BlogController::class, 'index'])->name('Frontoffice.Blogs.index'); 
Route::post('/blogs', [BlogController::class, 'store'])->name('Frontoffice.Blogs.store'); 
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('Frontoffice.blogs.show'); 
Route::resource('blogs.comments', CommentController::class)->only([ 'update', 'destroy']);
Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');
Route::post('/translate', [BlogController::class, 'translate']);





Route::get('/foodmarkets', [RestaurentController::class, 'frontView']);
Route::get('/foodmarkets/{id}', [RestaurentController::class, 'showFront'])->name('foodmarkets.show');
Route::post('/reviews/store/{restaurant}', [ReviewsController::class, 'store'])->name('reviews.store');
Route::get('/categories', [CategoryController::class, 'categoriesListeFrontOffice'])->name('categorieListe');
//CLIENT ROUTES
Route::middleware(['auth', 'isClient', 'verified'])->group(function () {
    Route::get('/{categoryID}/foods', [CategoryController::class, 'getListFoodByCategorie'])->name('category.foods');
    Route::get('/checkout', function () {  return view('Frontoffice.order.Checkout');})->name('checkout');
    Route::get('/order', function () {  return view('Frontoffice.order.order');})->name('order');
    Route::post('/order',  [OrderController::class, 'store'])->name('storeOrder');
    //reviews Routes
    Route::get('/myreviews', [ReviewsController::class, 'indexUser'])->name('myreviews');
    Route::get('/reviews/{review}/edit', [ReviewsController::class, 'edit'])->name('reviews.edit'); 
    Route::delete('/reviews/{review}', [ReviewsController::class, 'destroy'])->name('reviews.destroy');
    Route::put('/reviews/{id}', [ReviewsController::class, 'update'])->name('reviews.update');
});





Route::get('/forgetpassword', function () {
    return view('Auth.ForgotPassword');
});











Route::get('/edit-profile', function () {
    return view('Dashboard-Agent.EditProfile');
})->name('EditProfile');




Route::get('/agent/dashboard/orders', function () {
    return view('Dashboard-Agent.Orders');
})->name('dashboard-agent.my-orders');




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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
