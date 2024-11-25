<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Route, Auth};
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\{FrontendController, HomeController, SocialController, ProfileController, BackupController, RoleController, UserController, CategoryController, CollectionController, ProductController};

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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('all/categories', [FrontendController::class, 'all_categories'])->name('all.categories');
Route::get('s_category/{slug}/{sub_slug?}', [FrontendController::class, 's_category'])->name('s.category');
Route::get('product-details/{slug}', [FrontendController::class, 'product_details'])->name('product.details');
Route::get('get/size/{product_id}/{color_id}', [FrontendController::class, 'get_size'])->name('get.size');
Route::get('collections', [FrontendController::class, 'collections'])->name('collections');
Route::get('collections/{slug}', [FrontendController::class, 's_collections'])->name('s.collections');
Route::get('contact-us', [FrontendController::class, 'contact_us'])->name('contact.us');
Route::post('contact-us', [FrontendController::class, 'contact_us_post'])->name('contact.us.post');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/import', [HomeController::class, 'import'])->name('import');

//Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent again!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Socialite Routes
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook'])->name('auth.facebook.callback');

Route::middleware(['auth'])->group(function () {
    //Collection Routes
    Route::resource('collection', CollectionController::class);

    //Category Routes
    Route::resource('category', CategoryController::class);
    Route::post('subcategory/{category_id}', [CategoryController::class, 'subcategory_store'])->name('subcategory.store');
    Route::get('get/subcategory/{category_id}', [CategoryController::class, 'get_subcategory'])->name('get.subcategory');

    //Collection Routes
    Route::resource('product', ProductController::class);
    Route::get('product/manage/inventory/{product}', [ProductController::class, 'product_manage_inventory'])->name('product.manage.inventory');
    Route::post('product/manage/inventory/{product}', [ProductController::class, 'product_manage_inventory_post'])->name('product.manage.inventory.post');

    //Profile Routes
    Route::resource('profile', ProfileController::class);

    //Backup Routes
    Route::resource('backup', BackupController::class);

    //Role Routes
    Route::resource('role', RoleController::class);

    //User Routes
    Route::resource('user', UserController::class);
});
