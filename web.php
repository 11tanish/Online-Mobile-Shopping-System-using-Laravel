<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use App\Models\Userm;
use App\Models\Prodm;
use App\Models\Cart;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\NewPassController;
use App\Http\Controllers\Auth\ResetPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', function () {
    $products = App\Models\Prodm::all();
    return view('home', ['products' => $products]);
});

Route::get('/home',function(){
    return view('home');
});

Route::get('/dashboard',function(){
    return Redirect::route('vieworder.index');
});
//user layout routes:-

Route::get('/contact',function(){
    return view('/user-layout/contact');
});

Route::get('/about',function(){
    return view('/user-layout/about');
});

Route::get('/products', [App\Http\Controllers\ProController::class, 'showProductsPage'])->name('user-layout.products');
/*Route::get('/products',function(){
    $products = App\Models\Prodm::all();
    return view('/user-layout/products', ['products' => $products]);
});*/

/*Route::get('/checkout',function(){
    return view('/user-layout/checkout');
})->name('checkout');*/

Route::get('/order',function(){
    return view('/user-layout/order');
});

Route::get('/order2',function(){
    return view('/user-layout/order2');
});

Route::get('/services', [App\Http\Controllers\ProController::class, 'showServicesPage'])->name('user-layout.services');

//Route::post('/buy', [ProController::class, 'buy'])->name('buy');

//Route::post('/buy-product', 'OrderController@processBuyRequest');

//Route::post('/buy-product', [ProController::class, 'buyProduct'])->name('buy-product');

//Route::post('/buy-product', 'ProController@buyProduct');

//Route::post('/purchase', [ProController::class, 'buyProduct'])->name('purchase');
//Route::get('/buy', [OrderController::class, 'processBuyRequest'])->name('processBuyRequest');
//Route::get('/buy', [OrderController::class, 'showPurchaseForm'])->name('buyForm');
//Route::post('/buy', [OrderController::class,'buyProduct'])->name('buyProduct');

/*Route::get('/purchase-form', [OrderController::class, 'showPurchaseForm'])->name('purchaseForm');
Route::post('/purchase-form', [OrderController::class, 'processPurchaseForm']);
Route::post('/buy', [OrderController::class, 'buyProduct'])->name('buyProduct');

Route::post('/buyProduct', [ProController::class,'buyProduct'])->name('buyProduct');*/

Route::get('/purchase-form', function () {
    $products = App\Models\Prodm::all();
    return view('user-layout.purchase_form', ['products' => $products]);
})->name('purchaseForm');

// Route to process the purchase form submission
/*Route::post('/process-purchase', 'App\Http\Controllers\OrderController@processPurchaseForm')->name('processPurchase');
Route::post('/buy-product', 'App\Http\Controllers\OrderController@buyProduct')->name('buyProduct');*/

//Route::get('/purchase-form', [OrderController::class, 'showPurchaseForm'])->name('purchaseForm');
Route::post('/purchase-form', [App\Http\Controllers\OrderController::class, 'processPurchaseForm'])->name('processPurchase');
Route::post('/buyProduct', [App\Http\Controllers\OrderController::class,'buyProduct'])->name('buyProduct');



//add to cart route:-
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('showCart');
Route::post('/addToCart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class,'checkout'])->name('checkout.submit');
//admin layout routes:-


Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'auth']);
/*Route::post('/validate',[App\Http\Controllers\LoginController::class,'auth']);*/



Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

//Route::post('/validate',[App\Http\Controllers\LoginController::class,'auth']);
//Route::get('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'showForgotPasswordForm']);

Route::get('/forgot-password', [NewPassController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [NewPassController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');



Route::get('/logout',function(){
    session()->forget('fullname');
    session()->forget('userid');
    session()->forget('usertype');
    return redirect('/login');
});

Route::get('/viewusers',[App\Http\Controllers\UserController::class,'index']);

Route::get('/viewpro',[App\Http\Controllers\ProController::class,'index']);
Route::get('/vieworder', [OrderController::class, 'index'])->name('vieworder.index');
Route::get('/adduser',function()
{
    return view('adduser');
});

Route::post('/add',[App\Http\Controllers\UserController::class,'store']);

Route::get('/addpro',function()
{
    return view('addpro');
});
Route::post('/addpro',[App\Http\Controllers\ProController::class,'store']);

Route::get('/deleteuser',[App\Http\Controllers\UserController::class,'delete']);

//Route::get('/edituser',[App\Http\Controllers\UserController::class,'edit']);

Route::get('/edituser', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/edit', [App\Http\Controllers\UserController::class, 'update']);

Route::get('/editpro', [App\Http\Controllers\ProController::class, 'edit1']);
Route::post('/edit1', [App\Http\Controllers\ProController::class, 'update']);

Route::get('/deletepro',[App\Http\Controllers\ProController::class,'destroy']);
/*Route::get('/edituser',function()
{
    return view('edituser');
});

Route::post('/edit',[App\Http\Controllers\UserController::class,'edit']);*/
