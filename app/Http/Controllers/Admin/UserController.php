<?php

namespace App\Http\Controllers\Admin;

use App\Http\Api\V1\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    /**
     * 注册
     * @param Request $request
     * @return mixed
     */
    public function register(Request $request)
    {
        if ($request->method() === 'POST') {

            // 验证表单
            $rules = [
                'name' => ['required', 'between:5,16',],
                'email' => ['required'],
                'password' => ['required', 'between:6,16', 'confirmed'],
            ];
            $message = [
                'name.required' => '用户名为必填项',
                'name.between' => '用户名长度必须是6-16',
                'email.required' => '邮箱为必填项',
                'password.required' => '密码为必填项',
                'password.between' => '密码长度必须是6-16',
                'password.confirmed' => '两次输入的密码不一致',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            // 验证用户名和邮箱是否存在
            if (User::where('name', $request['name'])->first()) {
                return back()->with('errors', '用户名已经存在');
            } elseif (User::where('email', $request['email'])->first()) {
                return back()->with('errors', '邮箱已经存在');
            }

            // 创建用户
            $user = User::create($request->except(['_token', 'password', 'password_confirmation']));
            $user->password = Crypt::encrypt($request['password']);
            $user->is_admin = 1; // 是管理员
            $user->save();

            return redirect()->route('admin.login')->with(['email' => $request['email'], 'password' => $request['password']]);
        }
        return view('admin.login.register');
    }

    /**
     * 登录
     * @param Request $request
     * @return $this
     */
    public function login(Request $request)
    {
        // 已经登录则直接跳转
        if (Session::has('user')) {
            return redirect()->route('admin.index');
        }
        if ($request->method() === 'POST') {
            // 验证输入
            $rules = [
                'email' => ['required'],
                'password' => ['required', 'between:6,16'],
            ];
            $message = [
                'email.required' => '邮箱为必填项',
                'password.required' => '密码为必填项',
                'password.between' => '密码长度必须是6-16',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            // 查询用户信息
            $user = User::where('email', $request['email'])->where('is_admin', 1)->first();
            if ($user && $request['password'] == Crypt::decrypt($user->password)) {
                // 登录成功
                Session::put('user', $user);
                return redirect()->route('admin.index');
            }
            return back()->with('errors', '邮箱或密码错误!');
        }

        return view('admin.login.login');
    }

    /**
     * 退出登录
     * @return mixed
     */
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('admin.login');
    }
}
