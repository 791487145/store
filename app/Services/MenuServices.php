<?php
namespace App\Services;


use App\Model\Menu;
use App\Model\User;
use Illuminate\Support\Facades\Crypt;

class MenuServices extends BaseServices
{
    /**
     * 获取根菜单
     * @return mixed
     */
    public function getMenuRoot()
    {
        return Menu::whereIsRoot()->get();
    }
    /**
     * 菜单创建
     * @param $data
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function menuCreate($data)
    {


    }


}
