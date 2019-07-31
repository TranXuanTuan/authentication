<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class RegisterController extends Controller
{
	public function getRegister()
	{
		return view('register');
	}
	public function postRegister(Request $request)
	{
		$this->validate($request,
		[
			'name' =>'required',
			'email' => 'required|email',
			'password'=> 'required|min:8',
			're_password'=>'required|same:password'
		],
		[
			'name.required'=>'Vui Lòng Nhập Tên',
			'email.required'=>'Vui Lòng Nhập Email',
			'email.email'=>'Email không đúng định dạng',
			'password.required'=>'Vui lòng nhập mật khẩu',
			're_password.required'=>'Vui lòng nhập lại mật khẩu',
			're_password.same'=>'Mật khẩu không giống',
			'password.min'=>'Mật khẩu phải có ít nhất 8 ký tự'
		]
	);
	$user = new User();
	$user->name =$request->name;
	$user->email=$request->email;
	$user->password=Hash::make($request->password);
	$user->save();
	return redirect()->back()->with('thanhcong','Dang Ky Thanh Cong');
	}
}
