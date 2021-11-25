<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
	/**
	 * Danh sách danh mục
	 */
	public function index()
	{
		// Danh sách danh mục
		$categories = Category::with('parent')->withCount('products')->paginate(5);

		// Tên trang
		$pageName = __('Quản lý danh mục');

		// Breadcrumb
		$breadcrumbs = [
			[
				'link' => route('admin::index'),
				'text' => __('Trang quản trị')
			],
			$pageName
		];

		$view = compact('categories', 'pageName','breadcrumbs');

		return view('admin::category.index')->with($view);
	}
}
