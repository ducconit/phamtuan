<?php

namespace App\Models;

use App\Pivots\CategoryProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use HasFactory;
	use SoftDeletes;

	/**===============================================
	 * ===================SCOPED======================
	 * ===============================================
	 * cú pháp scope{tên scope viết hoa chữ đầu}
	 */

	/**===============================================
	 * =============RELATIONSHIP======================
	 * ===============================================
	 */
	/**
	 * Danh sách sản phẩm
	 * n - n
	 */
	public function products()
	{
		return $this->belongsToMany(Product::class)->using(CategoryProduct::class);
	}

	/**
	 * Danh mục cha
	 * 1 - n
	 */
	public function parent()
	{
		return $this->belongsTo(Category::class, 'parent_id')->withDefault();
	}
}
