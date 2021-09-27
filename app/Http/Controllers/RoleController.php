<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\UsersRequest;
use App\Services\RoleServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\False_;

class RoleController extends BaiscController
{
    private $service;

    public function __construct(RoleServices $service)
    {
        $this->service = $service;
    }

    /**
     * 列表展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('role/role_list');
    }

    /**
     * 角色数据
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function roleLists(Request $request)
    {
        $name = $request->get('name','');
        [$role , $count] = $this->service->getRoleLists($name);
        return $this->success_page($role,$count);
    }

    /**
     * 创建展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('role/role_add');
    }

    /**
     * 角色存储
     * @param RoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RoleRequest $request)
    {
        $param = $request->all('data');
        $data = $param['data'];
        $this->service->roleCreate($data);
        return $this->success('创建成功');
    }

    /**
     * 角色展示
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function show($id)
    {
        $role = $this->service->getOneRole($id);
        return view('role/role_edit',['role'=>$role]);

    }

    /**
     * 角色编辑
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function update(Request $request)
    {
        $param = $request->all('data');
        $data = $param['data'];
        $this->service->roleUpdate($data);
        return $this->success('编辑成功');
    }

    /**
     * 角色状态修改
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request)
    {
        $data = [
            'id' => $request->post('id',''),
            'is_use' => $request->post('is_use',1)
        ];

        $this->service->roleStatus($data);
        return $this->success('修改成功');
    }

    /**
     * 角色删除
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\InvalidRequestException
     * @throws \Throwable
     */
    public function delete(Request $request)
    {
        $id = $request->post('id','');
        $this->service->roleDelete($id);
        return $this->success('删除成功');
    }

    /**
     * 角色数据
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function permission($id)
    {
        $role = $this->service->getOneRole($id);
        return view('role/role_permission',['role'=>$role]);
    }

    /**
     * 角色权限数据树
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function permissionTree($id)
    {
        [$role,$menus] = $this->service->rolePermission($id);
        return $this->success_data($menus);
    }

    /**
     * 角色分配权限
     * @param $id
     */
    public function permissionChange(Request $request)
    {
        $role_id = $request->post('role_id','');
        $permissions = $request->post('permissions','');
        if(empty($role_id) || empty($permissions)){
            return $this->fail('参数有误');
        }
        $this->service->roleAssignPermission($role_id,$permissions);
        return $this->success('操作成功');
    }



}
