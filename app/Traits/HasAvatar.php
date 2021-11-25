<?php

namespace App\Traits;

trait HasAvatar
{
	/**
	 * Tạo thuộc tính có thên avatar
	 */
	public function getAvatarAttribute(): string
	{
		return $this->avatar_path ?? $this->avatarDefault();
	}

	private function avatarDefault(): string
	{
		return 'adminlte/img/avatar-default.png';
	}
}
