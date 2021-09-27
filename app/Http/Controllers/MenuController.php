<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Requests\UsersRequest;
use App\Services\MenuServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;

class MenuController extends BaiscController
{
    private $service;

    public function __construct(MenuServices $menuServices)
    {
        $this->service = $menuServices;
    }

    /**
     * 列表展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('menu/menu_list');
    }

    /**
     * 创建展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = $this->service->getMenuTree();
        return view('menu/menu_add',['data'=>$data]);
    }



    public function show($id)
    {
        $tree = $this->service->getMenuTree();
        $menu = $this->service->getOneMenu($id);
        return view('menu/menu_edit',['tree'=>$tree,'menu'=>$menu]);
    }

    /**
     * 菜单创建
     * @param MenuRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MenuRequest $request)
    {
        $param = $request->all('data');
        $data = $param['data'];
        $this->service->menuCreate($data);
        return $this->success('创建成功');
    }

    /**
     * 菜单数据列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function menuLists(Request $request)
    {
        [$menus,$count] = $this->service->getMenus();
        return $this->success_page($menus,$count);
    }

    /**
     * 菜单修改
     * @param MenuRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function update(Request $request)
    {
        $param = $request->all('data');
        $data = $param['data'];
        $this->service->menuUpdate($data);
        return $this->success('修改成功');
    }

    /**
     * 菜单删除
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\InvalidRequestException
     */
    public function delete($id)
    {
        if(!is_numeric($id)){
            return $this->fail('参数有误');
        }
        $this->service->deleteMenu($id);
        return $this->success('删除成功');
    }

    public function menuUserList()
    {

    }

}
