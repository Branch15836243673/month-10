<?php

namespace App\Http\Controllers\Month;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function login(){
        return view('month.login');
    }

    public function logIng(Request $request){
        $bool = $request->except();
    }

    public function registerIndex(){
        return view('month.register');
    }

    public function register(Request $request){
        $post = Validator::make($request->all(),[
            'username'=>'unique:users,username',
            'password'=>'min:5|max:20',
            'sex'=>'required',
            'phone'=>'unique:users,phone',
            'email'=>'email|unique:users,email',
        ],[
            'username.unique'=>'该用户名太受欢迎，请重新选择',
            'password.min'=>'密码长度最短5位',
            'password.max'=>'密码长度最长20位',
            'sex.required'=>'性别必选',
            'phone.unique'=>'该手机号码已经填写',
            'email.unique'=>'该邮箱账户已注册',
        ]);
        if($post->fails()){
           return $post->errors()->first();
        }
        if($request['icon']){
            $icon = $request->file('icon')->store('','icon');;
        }
        $icon='/uploads/icon/'.$icon;
        session('username',$request['username']);
        $data = User::insert(['username'=>$request['username'],
            'password'=>$request['password'],
            'sex'=>$request['sex'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'icon'=>$icon]);
        if($data){
            return redirect(route('month.login'));
        }else{
            return redirect(route('month.register'));
        }
    }
}
