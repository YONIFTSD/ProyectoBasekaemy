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

// Route::get('/link', function () {
// Artisan::call('storage:link');
// });

//pages
Route::get('/', 'PageController@Inicio');
Route::get('tienda', 'PageController@Tienda');
Route::get('nosotros', 'PageController@Nosotros');
Route::get('contactenos', 'PageController@Contactenos');
Route::post('contactenos', 'MailController@Contactenos');
Route::get('condiciones-de-venta', 'PageController@CondicionesVenta');
Route::get('cambios-y-devoluciones', 'PageController@CambiosDevoluciones');
Route::get('guia-de-tallas', 'PageController@GuiaTallas');
Route::get('preguntas-frecuentes', 'PageController@PreguntasFrecuentes');

//products
Route::get('productos', 'PageController@Categorias');
Route::get('productos/{category}/{title}/c', 'PageController@ProductoCategory');
Route::get('productos/{subcategory}/{title}/s', 'PageController@ProductoSubCategory');
Route::get('productos/{product}/{title}/p', 'PageController@Producto');
Route::get('productos/search', 'PageController@ProductoSearch');


//cart
Route::get('mi-carrito', 'CartController@MiCarrito');
Route::get('cart/detail-cart', 'CartController@listToCart');
Route::get('cart/add-to-cart', 'CartController@addToCart');
Route::get('cart/update-to-cart', 'CartController@updateToCart');
Route::get('cart/remove-from-cart', 'CartController@removeFromCart');
Route::get('cart/sumary-cart', 'CartController@sumamryCart');
Route::get('cart/coupon', 'CartController@ValidateCoupon');
Route::get('cart/checkout', 'CartController@Checkout')->middleware('auth');
Route::post('cart/validate-order', 'CartController@ValidateOrder')->middleware('auth');
Route::post('cart/send-order', 'CartController@SendOrder')->middleware('auth');
Route::get('cart/order-complete/{id_order}', 'CartController@OrderComplete')->middleware('auth');
Route::get('cart/number-cart', 'CartController@CartNumber');



//auth customer
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::prefix('my-account')->group(function () {
    Route::get('/', 'HomeController@Dashbaord');
    Route::get('orders', 'HomeController@Orders');
    Route::get('orders/{id}', 'HomeController@OrderView');
    Route::get('edit', 'HomeController@Account');
    Route::get('change-password', 'HomeController@ChangePassword');
    Route::post('change-password', 'HomeController@UpdatePassword');
    Route::post('edit', 'HomeController@UpdateCustomer');
});