<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;


class LoginController extends Controller
{
	public function getLogin()
	{
		return view('login');
	}
	public function postLogin(Request $request)
	{
		$rules = [
			'email' => 'required|email',
			'password'=> 'required|min:8'
		];

		$messages = [
			'email.required' => 'Email bắt buộc điền',
			'email.email'=> 'Email không đúng định dạng',
			'password.required' =>'Mật Khẩu bắt buộc điền',
			'password.min' =>'Mật khẩu phải có ít nhất 8 ký tự'
		];
		$validator = Validator::make($request->all(), $rules,$messages);

		if($validator ->fails()){
			return redirect()->back()
			->withErrors($validator)
			->withInput();
		}else{
			$email = $request->input('email');
    		$password = $request->input('password');

    		if(Auth::attempt(['email' => $email, 'password' => $password])) {
    			return redirect()->intended('/');
    		} else {
    			$errors = new MessageBag(['errorlogin'=>'Email hoac mat khau khong dung']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
		}
	}
}
