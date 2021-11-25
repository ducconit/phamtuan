<?php

namespace App\Traits;

trait HasAvatar
{
	/**===============================================
	 * ===================ATTRIBUTE===================
	 * ===============================================
	 * cú pháp get{tên thuộc tính viết hoa chữ đầu}Attribute()
	 * /
	/**
	 * Tạo thuộc tính có thên avatar
	 */
	public function getAvatarAttribute(): string
	{
		return $this->avatar_path ?? $this->avatarDefault();
	}

	/**
	 * Avatar mặc định
	 */
	public function avatarDefault(): string
	{
		return 'adminlte/img/avatar-default.png';
	}
}
