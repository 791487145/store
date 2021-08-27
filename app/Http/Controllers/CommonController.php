<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Requests\UsersRequest;
use App\Services\MenuServices;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;

class CommonController extends BaiscController
{

    use Common;

    /**
     * 生成表单token
     * @return \Illuminate\Http\JsonResponse
     */
    public function formToken()
    {
        return $this->success_data(['token'=> $this->createToken()]);
    }



}
