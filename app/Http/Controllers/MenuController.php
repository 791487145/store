<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Requests\UsersRequest;
use App\Services\MenuServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        $this->service->getMenuTree();
        return view('menu/menu_add');
    }



    public function show()
    {
        dd(342);
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

    public function menuLists(Request $request)
    {
        [$menus,$count] = $this->service->getMenus();
        return $this->success_page($menus,$count);
    }

}
