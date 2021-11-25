<?php

use App\Admin\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// route('admin::index');
Route::middleware(['web'])->prefix('admin')->name('admin::')->group(function () {
	// Phần người chưa đăng nhập
	Route::middleware('guestAdmin')->group(function () {
		Route::get('login', [\App\Admin\Controllers\AuthController::class, 'showFormLogin'])->name('login');
		Route::post('login', [\App\Admin\Controllers\AuthController::class, 'login'])->name('login');
	});


	/**=============================================================================
	 * ================Người dùng đã đăng nhập và là admin==========================
	 * =============================================================================
	 */
	Route::middleware('admin')->group(function () {
		Route::get('/', [\App\Admin\Controllers\AdminController::class, 'index'])->name('index');
		/**
		 * Quản lý danh mục
		 */
		Route::prefix('category')->name('category.')->group(function () {
			// Danh sách
			Route::get('/', [CategoryController::class, 'index'])->name('index');
			// xem chi tiết
			Route::get('{id}', [CategoryController::class, 'show'])->name('show');
			// sửa
			Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
			// Xóa
			Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
		});
	});
});
