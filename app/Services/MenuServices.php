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
     * 用户创建
     * @param $data
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function userCreate($data)
    {
        $data['password'] =  Crypt::encryptString($data['password']);
        return User::create($data);
    }

    /**
     * 获取用户列表
     * @return array
     */
    public function getUserLists()
    {
        [$page , $limit] = $this->getPage();

        $count = User::query()->count();
        $user = User::query()->forPage($page,$limit)->get()->toArray();

        return [$user,$count];
    }
}
