<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{





















	/**================================================================
	 * Trả về giáo diện đăng nhập
	 */
	public function showFormLogin()
	{
		return view('admin::auth.login');
	}

	/**
	 * Xử lý đăng nhập
	 */
	public function login(Request $request)
	{
		// validation
		$validator = Validator::make($request->all(), [
			'username' => 'required|string',
			'password' => 'required|string',
		], [], [
			'username' => __('Tài khoản'),
			'password' => __('Mật khẩu'),
		]);

		// nếu chưa đúng format
		if ($validator->fails()) {
			return $this->response($validator->errors(), 422);
		}

		$login = Auth::guard('admin')->attempt([
			'username' => $request->get('username'),
			'password' => $request->get('password'),
		], $request->get('remember'));

		// Đã đăng nhập thành công
		if ($login) {
			return $this->response(null, 200, __('Đăng nhập thành công'));
		}
		return $this->response(null, 401, __('Sai tài khoản hoặc mật khẩu'));
	}
}
