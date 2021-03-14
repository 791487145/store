<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\False_;

class EmailController extends BaiscController
{
    private $service;

    /*public function __construct(UsersServices $usersServices)
    {
        $this->service = $usersServices;
    }*/

    /**
     * 列表展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('users/user_list');
    }

    /**
     * 创建展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('users/user_add');
    }

    /**
     * 用户存储
     * @param Request $request
     * @param UsersRequest $usersRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request,UsersRequest $usersRequest)
    {
        $param = $request->all('data');
        $data = $param['data'];
        unset($data['pass']);
        $this->service->userCreate($data);
        return $this->success('创建成功');
    }

}
