<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ContactGmailController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');

Route::get('flash-sale',[FlashSaleController::class,'index'])->name('flash-sale');


/** Product details route*/
Route::get('products', [FrontendProductController::class, 'productsIndex'])->name('products.index');
Route::get('product-detail/{slug}',[FrontendProductController::class,'showProduct'])->name('product-detail');
Route::get('change-product-list-view', [FrontendProductController::class, 'chageListView'])->name('change-product-list-view');

/*Cart routes */
Route::post('add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');
Route::get('cart-details',[CartController::class,'cartDetails'])->name('cart-details');
Route::post('cart/update-quantity',[CartController::class,'updateProductQty'])->name('cart.update-quantity');
Route::get('clear-cart',[CartController::class,'clearCart'])->name('clear.cart');
Route::get('cart/remove-product/{rowId}',[CartController::class,'removeProduct'])->name('cart.remove-product');
Route::get('cart-count',[CartController::class,'getCartCount'])->name('cart-count');
Route::get('cart-products',[CartController::class,'getCartProducts'])->name('cart-products');
Route::post('cart/remove-sidebar-product',[CartController::class,'removeSidebarProduct'])->name('cart.remove-sidebar-product');
Route::get('cart/sidebar-product-total',[CartController::class,'cartTotal'])->name('cart.sidebar-product-total');

Route::get('apply-coupon',[CartController::class,'applyCoupon'])->name('apply-coupon');
Route::get('coupon-calculation',[CartController::class,'couponCalculation'])->name('coupon-calculation');

/** blog routes */
Route::get('blog-details/{slug}', [BlogController::class, 'blogDetails'])->name('blog-details');
Route::get('blog', [BlogController::class, 'blog'])->name('blog');

/**contact */
Route::get('contact', [ContactController::class, 'index'])->name('contact');
// Route::post('store', [ContactController::class, 'store'])->name('store');
Route::resource('contact',ContactController::class);

/**About */
Route::get('about', [AboutController::class, 'index'])->name('about');
/** blog comment routes */
Route::post('blog-comment',[BlogController::class,'comment'])->name('blog-comment');
Route::get('send-mail',function(){
    Mail::raw('this is a test mail', function($message){
        $message->to('test@gmail.com')->subject('Thông tin liên lạc');
    });
});

Route::get('send-mail',[ContactGmailController::class,'sendmail'])->name('send-mail');

Route::get('/dashboard', function () {
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware'=>['auth','verified'],'prefix'=>'user','as'=>'user.'],function(){
    Route::get('dashboard',[UserDashboardController::class,'index'])->name('dashboard');
    Route::get('profile',[UserProfileController::class,'index'])->name('profile');
    Route::put('profile',[UserProfileController::class,'updateProfile'])->name('profile.update');
    Route::post('profile',[UserProfileController::class,'updatePassword'])->name('profile.update.password');

    /** User Address route */
    Route::resource('address', UserAddressController::class);

    /** Checkout routes */
    Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('checkout/address-create', [CheckOutController::class, 'createAddress'])->name('checkout.address.create');
    Route::post('checkout/form-submit', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.form-submit');

     /** Payment Routes */
     Route::get('payment', [PaymentController::class, 'index'])->name('payment');
     Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

     /** Paypal routes */
    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

});
