<?php
namespace App\Services;


use App\Exceptions\InvalidRequestException;
use App\Lib\Coding;
use App\Model\Menu;
use App\Model\User;
use App\Traits\Common;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\True_;

class MenuServices extends BaseServices
{
    use Common;

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

    /**
     * 获取菜单树
     * @return array
     */
    public function getMenuTree()
    {
        $menu_tree = Menu::get();
        if($menu_tree->isEmpty()){
            return [];
        }
        return $this->arr2table($menu_tree->toArray());
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
                (new Menu($data))->saveAsRoot();
            }else{
                Menu::create($data,Menu::whereId($data['parent_id'])->first());
            }
        }catch (\Exception $exception){
            Log::alert('menu_create:'.print_r($exception->getMessage(),true));
        }
        return true;
    }

    /**
     * 获取菜单详情
     * @param $menu_id
     * @throws InvalidRequestException
     */
    public function getOneMenu(int $menu_id)
    {
        $menu = Menu::whereId($menu_id)->first();
        if(empty($menu)){
            throw new InvalidRequestException('参数有误',Coding::HTTP_ERROR);
        }
        return $menu;
    }

    /**
     * 菜单修改
     * @param array $data
     * @return bool
     * @throws InvalidRequestException
     */
    public function menuUpdate(array $data)
    {
        $menu = Menu::whereId($data['id'])->first();
        if(is_null($menu)){
            throw new InvalidRequestException('菜单不存在',Coding::HTTP_ERROR);
        }
        $menu_id = $data['id'];
        unset($data['id']);

        if($data['parent_id'] == $menu->id){
            throw new InvalidRequestException('不可选择自己为父级菜单',Coding::HTTP_ERROR);
        }
        if($data['parent_id'] == $menu->parent_id){
            Menu::whereId($menu_id)->update($data);
            return true;
        }
        if($menu->parent_id == 0 && !empty($menu->descendants)){
            throw new InvalidRequestException('菜单下有子菜单存在，不能修改父级',Coding::HTTP_ERROR);
        }

        $menu->delete();
        if($data['parent_id'] == 0){
            (new Menu($data))->saveAsRoot();
            return true;
        }

        Menu::create($data,Menu::whereId($data['parent_id'])->first());
        return true;
    }

    /**
     * 菜单删除
     * @param $id
     * @return bool
     * @throws InvalidRequestException
     */
    public function deleteMenu(int $id)
    {
        $menu = Menu::whereId($id)->first();
        if(is_null($menu)){
            throw new InvalidRequestException('菜单不存在',Coding::HTTP_ERROR);
        }
        //dd($menu->descendants);
        if(!$menu->descendants->isEmpty()){
            throw new InvalidRequestException('菜单下有子菜单存在，不能删除',Coding::HTTP_ERROR);
        }
        $menu->delete();
        return true;
    }


}
