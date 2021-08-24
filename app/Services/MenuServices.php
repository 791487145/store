<?php
namespace App\Services;


use App\Model\Menu;
use App\Model\User;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\True_;

class MenuServices extends BaseServices
{
    /**
     * 获取菜单
     * @return mixed
     */
    public function getMenus()
    {
        $menus = Menu::get();
        $count = $menus->count();
        if($menus->isNotEmpty()){
            $menus = $menus->toArray();
        }

        return [$menus,$count];
    }

    public function getMenuTree()
    {
        $menu_tree = Menu::get()->toTree();
        if($menu_tree->isEmpty()){
            return [];
        }
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
