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

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
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


Route::get('/agent/dashboard/foods/create', [FoodController::class, 'index'])->name('food.create');

Route::get('/agent/dashboard/foods', [FoodController::class, 'listeOfFoodsByRestaurant'])->name('dashboard-agent.my-products');

Route::post('/agent/dashboard/foods/create', [FoodController::class, 'create'])->name('food.store');


Route::get('/signup', [RegisterController::class, 'showSignUpForm']);
Route::get('/signin', [LoginController::class, 'showSignInForm']);
Route::post('/signup', [RegisterController::class, 'register'])->name('signup');
Route::post('/signupClient', [RegisterController::class, 'registerClient'])->name('signupClient');
Route::post('/signin', [LoginController::class, 'login'])->name('signin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/contact', function () {return view('Frontoffice.contact.contact');})->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Dashboard-Admin.Dashboard');
    })->name('Dashboard');



    // Route::get('/restaurants', function () {
    //     return view('Dashboard-Admin.Restaurants');
    // });

    Route::get('/restaurants', [RestaurentController::class, 'indexAdmin'])->name('admin.restaurants');
    Route::put('/restaurants/{id}/status', [RestaurentController::class, 'updateStatus'])->name('restaurants.updateStatus');
    Route::delete('/restaurants/{id}', [RestaurentController::class, 'destroy'])->name('restaurants.destroy');


    Route::get('/users', function () {
        return view('Dashboard-Admin.UserList');
    });
    Route::get('/contactList', [ContactController::class, 'index'])->name('contactList');
});
Route::middleware(['auth', 'isAgent'])->group(function () {
    Route::get('/agent/dashboard', function () { return view('Dashboard-Agent.Dashboard');})->name('dashboard-agent');
    Route::get('/agent/dashboard/foods/create', function () { return view('Dashboard-Agent.foods.create');})->name('CreateFoods');

});
Route::middleware(['auth', 'isClient'])->group(function () {


});
Route::get('/', function () {  return view('Frontoffice.home');});
Route::get('/categories', [CategoryController::class, 'categoriesListeFrontOffice'])->name('categorieListe');
Route::get('/{category}/foods', function ($category) {  return view('Frontoffice.categories.foodscategorie',['category' => $category]);});
Route::get('/foodmarkets', function () {  return view('Frontoffice.foods.allmarkets');})->name('foodmarkets');;
Route::get('/restaurant/{restaurant}/foods', function ($restaurant) {  return view('Frontoffice.foods.foods',['restaurant' => $restaurant]);});
Route::get('/create-new-restaurant', function () {  return view('Dashboard-Agent.Restaurant.create');});




Route::get('/forgetpassword', function () {
    return view('Auth.ForgotPassword');
});


Route::get('/category', [CategoryController::class, 'index'])->name('categories.liste');
Route::post('/category/create', [CategoryController::class, 'create'])->name('categories.create');



Route::get('/blogs', [BlogController::class, 'index'])->name('Frontoffice.Blogs.index'); // Liste des blogs
Route::get('/blogs/create', [BlogController::class, 'create'])->name('Frontoffice.Blogs.create'); // Formulaire de création
Route::post('/blogs', [BlogController::class, 'store'])->name('Frontoffice.Blogs.store'); // Enregistrer un nouveau blog

Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('Frontoffice.blogs.show'); // Afficher un blog spécifique

Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');


Route::resource('blogs.comments', CommentController::class)->only(['store', 'update', 'destroy']);

// Route pour afficher les blogs de l'agent
Route::get('/agent/dashboard/blogs', [BlogController::class, 'agentBlogs'])->name('dashboard-agent.blogs');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('Frontoffice.Blogs.edit');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('Frontoffice.Blogs.update');
// Route pour supprimer un blog
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('Frontoffice.Blogs.destroy');



Route::get('/edit-profile', function () {
    return view('Dashboard-Agent.EditProfile');
})->name('EditProfile');




Route::get('/agent/dashboard/orders', function () {
    return view('Dashboard-Agent.Orders');
})->name('dashboard-agent.my-orders');

Route::get('/agent/dashboard/reviews', [ReviewsController::class, 'index'])->name('dashboard-agent.my-reviews');


// FranchiseUseless
route::get('/agent/dashboard/franchise', [FranchiseController::class, 'index'])->name('dashboard-agent.my-franchise');
Route::get('/agent/dashboard/franchise/{id}', [FranchiseController::class, 'showPLS'])->name('franchises.show');
Route::get('/agent/dashboard/franchise/{id}/edit', [FranchiseController::class, 'edit'])->name('franchises.edit');
Route::put('/agent/dashboard/franchise/{id}', [FranchiseController::class, 'update'])->name('franchises.update');
Route::post('/agent/dashboard/franchise/{id}/update-image', [FranchiseController::class, 'updateImage'])->name('franchises.update.image');
// Stocks
// Stocks
Route::get('/agent/dashboard/stock', [StockController::class, 'index'])->name('dashboard-agent.my-stock');
Route::get('/agent/dashboard/stocks/create', [StockController::class, 'create'])->name('stocks.create');
Route::post('/agent/dashboard/stocks', [StockController::class, 'store'])->name('stocks.store');
Route::get('/agent/dashboard/stocks/{id}', [StockController::class, 'show'])->name('stocks.show'); // Add this line
Route::get('/agent/dashboard/stocks/{id}/edit', [StockController::class, 'edit'])->name('stocks.edit');
Route::put('/agent/dashboard/stocks/{id}', [StockController::class, 'update'])->name('stocks.update');
Route::delete('/agent/dashboard/stocks/{id}', [StockController::class, 'destroy'])->name('stocks.destroy');
Route::post('/agent/dashboard/stocks/{id}/update-image', [StockController::class, 'updateImage'])->name('stocks.update.image');

//Restaurent Missa
Route::middleware(['auth', 'isAgent'])->group(function () {
    Route::resource('agent/dashboard/restaurents', RestaurentController::class)
        ->names([
            'index' => 'restaurents.index',
            'create' => 'restaurents.create',
            'store' => 'restaurents.store',
            'show' => 'restaurents.show',
            'edit' => 'restaurents.edit',
            'update' => 'restaurents.update',
            'destroy' => 'restaurents.destroy',
        ]);
});
Route::get('/agent/dashboard/restaurents/search', [RestaurentController::class, 'search'])->name('restaurents.search');



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