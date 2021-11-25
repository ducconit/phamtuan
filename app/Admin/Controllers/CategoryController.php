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

		$view = compact('categories', 'pageName', 'breadcrumbs');

		return view('admin::category.index')->with($view);
	}

	/**
	 * Xem chi tiết danh mục
	 */
	public function show($id)
	{
		// danh mục đang thao tác
		$category = Category::findOrFail($id);

		// Tên trang
		$pageName = __('Xem chi tiết danh mục');

		// Breadcrumb
		$breadcrumbs = [
			[
				'link' => route('admin::index'),
				'text' => __('Trang quản trị')
			],
			[
				'link' => route('admin::category.index'),
				'text' => __('Quản lý danh mục')
			],
			$pageName
		];

		$view = compact('pageName', 'category', 'breadcrumbs');

		return view('admin::category.show')->with($view);
	}

	/**
	 * Xóa danh mục
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);

		// Xóa các quan hệ sản phẩm
		$category->products()->detach();

		//Xoá mềm - chuyển vào thùng rác
		$category->restore();
		return $this->response(null, 200, __('Đã xoá danh mục thành công'));
	}
}
