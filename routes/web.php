<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\WishlistController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix'  => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store']) -> name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy']) -> name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile']) -> name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit']) -> name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore']) -> name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword']) -> name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'adminUpdateChangePassword']) -> name('update.change.password');


//user all route
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user() -> id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'userLogout']) -> name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile']) -> name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'userProfileStore']) -> name('user.profile.store');
Route::get('/user/password/change', [IndexController::class, 'changePassword']) -> name('user.password.change');
Route::post('/user/password/update', [IndexController::class, 'passwordUpdate']) -> name('user.password.update');


// Admin Brand all route
Route::prefix('brand') -> group(function(){
    Route::get('/view', [BrandController::class, 'brandView']) -> name('all.brand');
    Route::post('/store', [BrandController::class, 'brandStore']) -> name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'brandEdit']) -> name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'brandUpdate']) -> name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'brandDelete']) -> name('brand.delete');
});

// Admin Category all route
Route::prefix('category') -> group(function(){
    Route::get('/view', [CategoryController::class, 'categoryView']) -> name('all.category');
    Route::post('/store', [CategoryController::class, 'categoryStore']) -> name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit']) -> name('category.edit');
    Route::post('/update', [CategoryController::class, 'categoryUpdate']) -> name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete']) -> name('category.delete');
    /**************************************************************
     * Admin Sub Category All Route
     * ************************************************************/
    Route::get('/sub/view', [SubCategoryController::class, 'subCategoryView']) -> name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore']) -> name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'subCategoryEdit']) -> name('subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'subCategoryUpdate']) -> name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'subCategoryDelete']) -> name('subcategory.delete');
    /**************************************************************
     * Admin Sub-Sub Category All Route
     * ************************************************************/
    Route::get('/sub/sub/view', [SubCategoryController::class, 'subSubCategoryView']) -> name('all.subsubcategory');

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory']);

    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'getSubSubCategory']);

    Route::post('/sub/sub/store', [SubCategoryController::class, 'subSubCategoryStore']) -> name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'subSubCategoryEdit']) -> name('subsubcategory.edit');
    Route::post('/sub/sub/update', [SubCategoryController::class, 'subSubCategoryUpdate']) -> name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'subSubCategoryDelete']) -> name('subsubcategory.delete');
});

/******************************************************
 *  Admin Product all route
 ******************************************************/
Route::prefix('product') -> group(function(){
    Route::get('/add', [ProductController::class, 'addProduct']) -> name('all-product');
    Route::post('/store', [ProductController::class, 'storeProduct']) -> name('product-store');
    Route::get('/manage', [ProductController::class, 'manageProduct']) -> name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'editProduct']) -> name('product-edit');
    Route::post('/data/update', [ProductController::class, 'productDataUpdate']) -> name('product-update');
    Route::post('/image/update', [ProductController::class, 'multiImageUpdate']) -> name('update-product-image');
    Route::post('/thambnail/update', [ProductController::class, 'thambnailImageUpdate']) -> name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'multiImageDelete']) -> name('product-multiimg-delete');
    Route::get('/inactive/{id}', [ProductController::class, 'productInactive']) -> name('product-inactive');
    Route::get('/active/{id}', [ProductController::class, 'productActive']) -> name('product-active');
    Route::get('/delete/{id}', [ProductController::class, 'productDelete']) -> name('product-delete');
});

// Admin Slider all route
Route::prefix('slider') -> group(function(){
    Route::get('/view', [SliderController::class, 'sliderView']) -> name('manage-slider');
    Route::post('/store', [SliderController::class, 'sliderStore']) -> name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'sliderEdit']) -> name('slider.edit');
    Route::post('/update', [SliderController::class, 'sliderUpdate']) -> name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'sliderDelete']) -> name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'sliderInactive']) -> name('slider-inactive');
    Route::get('/active/{id}', [SliderController::class, 'sliderActive']) -> name('slider-active');
});


/*************************************************************
 *  frontend all route
 ****************************************************************/
//multi language all route
Route::get('/language/english', [LanguageController::class, 'english']) -> name('english.language');
Route::get('/language/bangla', [LanguageController::class, 'bangla']) -> name('bangla.language');

// product details page route
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productDetails']);

// product tag page route
Route::get('/product/tag/{tag}', [IndexController::class, 'tagWiseProduct']);

// sucategory wise data
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'subCategoryWiseData']);

// sucategory wise data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCategoryWiseData']);

// product view Modal with ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'productViewAjax']);

// Add to cart store
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// get data from mini cart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);

// remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCart']);



Route::group(['prefix' => 'user','middleware' => ['user','auth'],'namespace' => 'User'], function(){
// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'addToWishlist']);

// wishlist page load
Route::get('/wishlist', [WishlistController::class, 'viewWishlist']) -> name('wishlist');

// wishlist page data show
Route::get('/get-wishlist-product', [WishlistController::class, 'getWishlistProduct']);

// wishlist remove
Route::get('/wishlist-remove/{id}', [WishlistController::class, 'wishlistRemove']);

});
/***************** My cart page all route************************ */
// Add to Mycart page
Route::get('/mycart', [CartPageController::class, 'MyCart']) -> name('mycart');

// cart page data show
Route::get('/get-cart-product', [CartPageController::class, 'getCartProduct']);

// cart remove
Route::get('/cart-remove/{rowId}', [CartPageController::class, 'removeCartProduct']);

// cart increment
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'cartIncrement']);

// cart decrement
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'cartDecrement']);





