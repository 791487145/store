<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\False_;

class UsersController extends BaiscController
{

    public function index()
    {
        return view('users/user_list');
    }

    public function create()
    {
        return view('users/user_add');
    }

    public function store(Request $request,UsersRequest $usersRequest,UsersServices $usersServices)
    {
        $param = $request->all('data');
        $data = $param['data'];
        unset($data['pass']);
        $usersServices->userCreate($data);
        return $this->success('创建成功');
    }

}
