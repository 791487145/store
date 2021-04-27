<?php
namespace App\Services;


use App\Model\Menu;
use App\Model\User;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\True_;

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
        try{
            if($data['parent_id'] == 0){
                $menu = new Menu($data);
                $menu->saveAsRoot();
            }else{
                Menu::create($data,Menu::whereId($data['parent_id'])->first());
            }
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
        return true;

    }


}
