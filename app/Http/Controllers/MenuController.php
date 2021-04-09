<?php

namespace App\Http\Controllers;

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
        if($request->is('ajax')){

        }
        return view('menu/menu_list');
    }

    /**
     * 创建展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        dd($this->service->getMenuRoot());
        return view('menu/menu_add');
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

    public function menuLists(Request $request)
    {
        /*[$user , $count] = $this->service->getUserLists();
        return $this->success_page($user,$count);*/
    }

}
