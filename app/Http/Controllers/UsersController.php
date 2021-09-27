<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\False_;

class UsersController extends BaiscController
{
    private $service;

    public function __construct(UsersServices $usersServices)
    {
        $this->service = $usersServices;
    }

    /**
     * 列表展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
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
    public function store(UsersRequest $request)
    {
        $param = $request->all('data');
        $data = $param['data'];
        unset($data['pass']);
        $this->service->userCreate($data);
        return $this->success('创建成功');
    }

    /**
     * 用户数据列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userLists(Request $request)
    {
        [$user , $count] = $this->service->getUserLists();
        return $this->success_page($user,$count);
    }

    /**
     * 获取用户角色相关数据
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function role($id)
    {
        [$user,$roles] = $this->service->userRole($id);
        $role_id = 0;
        if($user->roles->isNotEmpty()){
            $role_id = $user->roles->first()->id;
        }
        return view('users/user_role',['user' => $user,'roles'=> $roles,'role_id'=>$role_id]);
    }

    /**
     * 用户分配角色
     * @param Request $request
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function roleChange(Request $request)
    {
        $param = $request->all('data');
        $data = $param['data'];
        $id = $data['id'];
        $role_id = $data['role_id'];
        $this->service->userAssignRole($id,$role_id);
        return $this->success('操作成功');
    }


}
