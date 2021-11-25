<?php

namespace App\Admin\Providers;

use App\Admin\Middlewares\Admin;
use App\Admin\Middlewares\GuestAdmin;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

	public function register()
	{
		/**
		 * - router
		 * - views
		 * - translation
		 * - middleware
		 * - migration
		 * - component
		 */
		// Khai báo router
		$this->loadRoutesFrom(app_path('Admin/Routes/web.php'));

		// Khai báo view admin
		// admin::
		$this->loadViewsFrom(app_path('Admin/Views'), 'admin');


		// Instance router của ứng dụng
		$router = $this->app->make('router');
		// thêm middleware vào danh sách middleware đã có
		$router->aliasMiddleware('admin', Admin::class);
		$router->aliasMiddleware('guestAdmin', GuestAdmin::class);
	}

	public function boot()
	{
		$this->viewCustoms();
	}

	/**
	 * Xử lý blade admin
	 */
	private function viewCustoms()
	{
		// Tạo biến toàn cục
		View::composer('admin::*', function (\Illuminate\Contracts\View\View $view) {
			$view->with('auth', Auth::guard('admin')->user());
		});

		//tạo view mặc định phân trang
		Paginator::defaultView('admin::components.pagination');
	}
}
