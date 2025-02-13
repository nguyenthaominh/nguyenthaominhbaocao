<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemController;
use App\Models\Vendor;

/** VendorRoutes */
Route::get('dashboard',[VendorController::class,'dashboard'])->name('dashboard');
Route::get('profile',[VendorProfileController::class,'index'])->name('profile');
Route::put('profile',[VendorProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile',[VendorProfileController::class,'updatePassword'])->name('profile.update.password');

/** Vendor shop Profile */
Route::resource('shop-profile',VendorShopProfileController::class);

/** Product Routes */
Route::get('product/get-subcategories',[VendorProductController::class,'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories',[VendorProductController::class,'getChildCategories'])->name('product.get-child-categories');
Route::resource('products',VendorProductController::class);
Route::put('product/change-status',[VendorProductController::class,'changeStatus'])->name('product.change-status');


/** Products image gallery route */
Route::resource('products-image-gallery',VendorProductImageGalleryController::class);

/** Products variant route */
Route::put('products-variant/change-status',[VendorProductVariantController::class,'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant',VendorProductVariantController::class);

/** Products variant item route */
Route::get('products-variant-item/{productId}/{variantId}',[VendorProductVariantItemController::class,'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}',[VendorProductVariantItemController::class,'create'])->name('products-variant-item.create');
Route::post('products-variant-item',[VendorProductVariantItemController::class,'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}',[VendorProductVariantItemController::class,'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}',[VendorProductVariantItemController::class,'update'])->name('products-variant-item.update');

Route::delete('products-variant-item/{variantItemId}',[VendorProductVariantItemController::class,'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status',[VendorProductVariantItemController::class,'changeStatus'])->name('products-variant-item.change-status');
