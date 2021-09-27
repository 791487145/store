<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaiscController;
use App\Model\User;
use App\Traits\Common;
use App\Traits\Reponse;
use Illuminate\Http\Request;


class LoginController extends BaiscController
{
    use Common,Reponse;
    /**
     * 登陆页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('login/login');
    }

    public function postLogin(Request $request)
    {
        $mobile = $request->post('mobile','');
        $password = $request->post('password','');
        $mobile = $this->openssl($mobile);
        $password = $this->openssl($password);
        if(auth()->attempt(['mobile'=>$mobile,'password'=>encrypt($password)])){
            return $this->success();
        }
        return $this->fail('账号密码错误');
    }



}
