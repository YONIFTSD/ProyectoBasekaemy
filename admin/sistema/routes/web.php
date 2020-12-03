<?php

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

//private
Route::prefix('')->group(function () {


    Route::get('', 'Auth\LoginController@Login')->middleware('guest')->name('admin');
    Route::get('login', 'Auth\LoginController@Login')->middleware('guest')->name('dashboard-login');
    Route::post('login', 'Auth\LoginController@Access')->middleware('guest')->name('dashboard-login');

    Route::middleware('Autenticacion')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('', 'DashboardController@Dashboard')->name('dashboard');
            Route::get('profile', 'DashboardController@Profile')->name('dashboard-profile');
            Route::post('update-profile', 'DashboardController@UpdateProfile')->name('dashboard-update-profile');
            Route::post('change-password', 'DashboardController@ChangePassword')->name('dashboard-change-password');
            Route::get('logout', 'Auth\LoginController@Logout')->name('dashboard-logout');
        });

        //users
        Route::prefix('user')->group(function () {
            Route::get('', 'UserController@List')->name('users');
            Route::get('add', 'UserController@Add')->name('user-add');
            Route::get('edit/{id}', 'UserController@Edit')->name('user-edit');
            Route::get('show/{id}', 'UserController@Show')->name('user-show');
            Route::post('store', 'UserController@Store')->name('user-store');
            Route::post('update', 'UserController@Update')->name('user-update');
            Route::get('delete/{id}', 'UserController@Destroy')->name('user-delete');
        });

        Route::prefix('cover-page')->group(function () {
            Route::get('', 'CoverPageController@List')->name('covers-page');
            Route::get('add', 'CoverPageController@Add')->name('cover-page-add');
            Route::get('edit/{id}', 'CoverPageController@Edit')->name('cover-page-edit');
            Route::get('show/{id}', 'CoverPageController@Show')->name('cover-page-show');
            Route::post('store', 'CoverPageController@Store')->name('cover-page-store');
            Route::post('update', 'CoverPageController@Update')->name('cover-page-update');
            Route::get('delete/{id}', 'CoverPageController@Destroy')->name('cover-page-delete');
        });

        Route::prefix('category')->group(function () {
            Route::get('', 'CategoryController@List')->name('categories');
            Route::get('add', 'CategoryController@Add')->name('category-add');
            Route::get('edit/{id}', 'CategoryController@Edit')->name('category-edit');
            Route::get('show/{id}', 'CategoryController@Show')->name('category-show');
            Route::post('store', 'CategoryController@Store')->name('category-store');
            Route::post('update', 'CategoryController@Update')->name('category-update');
            Route::get('delete/{id}', 'CategoryController@Destroy')->name('category-delete');
        });

        Route::prefix('subcategory')->group(function () {
            Route::get('', 'SubcategoryController@List')->name('subcategories');
            Route::get('add', 'SubcategoryController@Add')->name('subcategory-add');
            Route::get('edit/{id}', 'SubcategoryController@Edit')->name('subcategory-edit');
            Route::get('show/{id}', 'SubcategoryController@Show')->name('subcategory-show');
            Route::post('store', 'SubcategoryController@Store')->name('subcategory-store');
            Route::post('update', 'SubcategoryController@Update')->name('subcategory-update');
            Route::get('delete/{id}', 'SubcategoryController@Destroy')->name('subcategory-delete');
        });


        Route::prefix('product')->group(function () {
            Route::get('', 'ProductController@List')->name('products');
            Route::get('search', 'ProductController@Search_List')->name('product-search');
            Route::get('add', 'ProductController@Add')->name('product-add');
            Route::get('edit/{id}', 'ProductController@Edit')->name('product-edit');
            Route::get('show/{id}', 'ProductController@Show')->name('product-show');
            Route::post('store', 'ProductController@Store')->name('product-store');
            Route::post('update', 'ProductController@Update')->name('product-update');
            Route::get('delete/{id}', 'ProductController@Destroy')->name('product-delete');

            Route::get('photos/{id}', 'ProductPhotoController@List')->name('product-photos');
            Route::post('photo-store', 'ProductPhotoController@Store')->name('photo-store');
            Route::get('photo-delete/{id}', 'ProductPhotoController@Destroy')->name('photo-delete');

            Route::get('outstanding/{id}', 'ProductController@Outstanding')->name('product-outstanding');
            Route::get('getsubcategories/{id}', 'ProductController@GetSubcategories')->name('get-subcategories');

            //PROMOTION
            Route::get('search-product-promotions', 'ProductController@SearchProductPromotions')->name('search-product-promotions');
        });

        Route::prefix('promotion')->group(function () {
            Route::get('', 'PromotionController@List')->name('promotions');
            Route::get('add', 'PromotionController@Add')->name('promotion-add');
            Route::get('edit/{id}', 'PromotionController@Edit')->name('promotion-edit');
            Route::get('show/{id}', 'PromotionController@Show')->name('promotion-show');
            Route::post('store', 'PromotionController@Store')->name('promotion-store');
            Route::post('update', 'PromotionController@Update')->name('promotion-update');
            Route::get('delete/{id}', 'PromotionController@Destroy')->name('promotion-delete');
            
        });


        Route::prefix('coupon')->group(function () {
            Route::get('', 'CouponController@List')->name('coupons');
            Route::get('add', 'CouponController@Add')->name('coupon-add');
            Route::get('edit/{id}', 'CouponController@Edit')->name('coupon-edit');
            Route::get('show/{id}', 'CouponController@Show')->name('coupon-show');
            Route::post('store', 'CouponController@Store')->name('coupon-store');
            Route::post('update', 'CouponController@Update')->name('coupon-update');
            Route::get('delete/{id}', 'CouponController@Destroy')->name('coupon-delete');
        });


        Route::prefix('client')->group(function () {
            Route::get('', 'ClientController@List')->name('clients');
            Route::get('add', 'ClientController@Add')->name('client-add');
            Route::get('edit/{id}', 'ClientController@Edit')->name('client-edit');
            Route::get('show/{id}', 'ClientController@Show')->name('client-show');
            Route::post('store', 'ClientController@Store')->name('client-store');
            Route::post('update', 'ClientController@Update')->name('client-update');
            Route::get('delete/{id}', 'ClientController@Destroy')->name('client-delete');
        });



        Route::prefix('order')->group(function () {
            Route::get('', 'OrderController@List')->name('orders');
            Route::get('edit/{id}', 'OrderController@Edit')->name('order-edit');
            Route::get('show/{id}', 'OrderController@Show')->name('order-show');
            Route::post('update', 'OrderController@Update')->name('order-update');

            Route::get('change-to-confirm/{id}', 'OrderController@Confirm')->name('change-to-confirm');
            Route::get('change-to-cancel/{id}', 'OrderController@Cancel')->name('change-to-cancel');
            
        });
    });
});
// //public
// Route::get('', 'PageController@PublicPaperwork')->name('public-paperwork');
// Route::post('send-request', 'PageController@PublicPaperworkStore')->name('public-send-request');