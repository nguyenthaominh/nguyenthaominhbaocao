<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\UserController;
use App\Models\ChildCategory;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/** AdminRoutes */

Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
/** Profile Routes */
Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class,'updatePassword'])->name('password.update');

/** Slider Route */
Route::resource('slider',SliderController::class);

/** Category Route */
Route::put('category/change-status',[CategoryController::class,'changeStatus'])->name('category.change-status');
Route::resource('category',CategoryController::class);

/** Sub Category Route */
Route::put('subcategory/change-status',[SubCategoryController::class,'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category',SubCategoryController::class);

/** Child Category Route */
Route::put('child-category/change-status',[ChildCategoryController::class,'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories',[ChildCategoryController::class,'getSubCategories'])->name('get-subcategories');
Route::resource('child-category',ChildCategoryController::class);

/** Brand routes */
Route::put('brand/change-status',[BrandController::class,'changeStatus'])->name('brand.change-status');
Route::resource('brand',BrandController::class);

/** Vendor Profile routes */
Route::resource('vendor-profile',AdminVendorProfileController::class);

/** Product routes */
Route::get('product/get-subcategories',[ProductController::class,'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories',[ProductController::class,'getChildCategories'])->name('product.get-child-categories');
Route::put('product/change-status',[ProductController::class,'changeStatus'])->name('product.change-status');
Route::resource('products',ProductController::class);
/** Products image gallery route */
Route::resource('products-image-gallery',ProductImageGalleryController::class);
/** Products variant route */
Route::put('products-variant/change-status',[ProductVariantController::class,'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant',ProductVariantController::class);

/** Products variant item route */
Route::get('products-variant-item/{productId}/{variantId}',[ProductVariantItemController::class,'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}',[ProductVariantItemController::class,'create'])->name('products-variant-item.create');
Route::post('products-variant-item',[ProductVariantItemController::class,'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}',[ProductVariantItemController::class,'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}',[ProductVariantItemController::class,'update'])->name('products-variant-item.update');

Route::delete('products-variant-item/{variantItemId}',[ProductVariantItemController::class,'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status',[ProductVariantItemController::class,'changeStatus'])->name('products-variant-item.change-status');

/** Seller product routes */
Route::get('seller-products',[SellerProductController::class,'index'])->name('seller-products.index');
Route::get('seller-pending-products',[SellerProductController::class,'pendingProducts'])->name('seller-pending-products.index');
Route::put('change-approve-status',[SellerProductController::class,'changeApproveStatus'])->name('change-approve-status');

/** Flash sale routes */
Route::get('flash-sale',[FlashSaleController::class,'index'])->name('flash-sale.index');
Route::put('flash-sale',[FlashSaleController::class,'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product',[FlashSaleController::class,'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change',[FlashSaleController::class,'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale-status',[FlashSaleController::class,'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}',[FlashSaleController::class,'destroy'])->name('flash-sale.destroy');

/** Coupon Routes */
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])->name('coupons.change-status');
Route::resource('coupons', CouponController::class);

/** Order routes */
Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');
Route::get('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');

Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders', [OrderController::class, 'droppedOfOrders'])->name('dropped-off-orders');

Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('canceled-orders', [OrderController::class, 'canceledOrders'])->name('canceled-orders');
Route::resource('order', OrderController::class);

/** Shipping rulr */
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

/** Settings routes */
Route::get('settings',[SettingController::class,'index'])->name('setting.index');
Route::put('generale-setting-update',[SettingController::class,'generalSettingUpdate'])->name('generale-setting-update');

/** home page setting route */
Route::get('home-page-setting', [HomePageSettingController::class, 'index'])->name('home-page-setting');
Route::put('popular-category-section', [HomePageSettingController::class, 'updatePopularCategorySection'])->name('popular-category-section');

Route::put('product-slider-section-one', [HomePageSettingController::class, 'updateProductSliderSectionOne'])->name('product-slider-section-one');
Route::put('product-slider-section-two', [HomePageSettingController::class, 'updateProductSliderSectionTwo'])->name('product-slider-section-two');
Route::put('product-slider-section-three', [HomePageSettingController::class, 'updateProductSliderSectionThree'])->name('product-slider-section-three');

/** Blog routes */
Route::put('blog-category/status-change', [BlogCategoryController::class, 'changeStatus'])->name('blog-category.status-change');
Route::resource('blog-category', BlogCategoryController::class);

Route::put('blog/status-change', [BlogController::class, 'changeStatus'])->name('blog.status-change');
Route::resource('blog', BlogController::class);
Route::get('blog-comments', [BlogCommentController::class, 'index'])->name('blog-comments.index');
Route::delete('blog-comments/{id}/destory', [BlogCommentController::class, 'destory'])->name('blog-comments.destory');

/** Payment settings routes */
Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');
Route::resource('paypal-setting', PaypalSettingController::class);
// Route::put('stripe-setting/{id}', [StripeSettingController::class, 'update'])->name('stripe-setting.update');
// Route::put('razorpay-setting/{id}', [RazorpaySettingController::class, 'update'])->name('razorpay-setting.update');
// Route::put('cod-setting/{id}', [CodSettingController::class, 'update'])->name('cod-setting.update');


/** Contact */
Route::resource('contact', ContactController::class);

/** Thành viên */
Route::resource('user', UserController::class);
Route::put('change-status',[UserController::class,'changeStatus'])->name('user.change-status');
