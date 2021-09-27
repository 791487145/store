<?php
namespace App\Services;


use App\Exceptions\InvalidRequestException;
use App\Lib\Coding;
use App\Model\Menu;
use App\Model\Permissions;
use App\Model\User;
use App\Models\Permission;
use App\Traits\Common;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\True_;

class PermissionServices extends BaseServices
{
    use Common;

    /**
     * 获取菜单
     * @return mixed
     */
    public function getMenus()
    {
        $menus = Permissions::orderBy('parent_id','asc')->orderByDesc('sort')->get()->toArray();
        $count = count($menus);

        return [$menus,$count];
    }

    /**
     * 获取菜单树
     * @return array
     */
    public function getMenuTree()
    {
        $menu_tree = Permissions::whereIsMenu(Permissions::MENU_YES)->get();
        if($menu_tree->isEmpty()){
            return [];
        }
        return $this->arr2table($menu_tree->toArray());
    }

    /**
     * 获取权限树
     * @return array
     */
    public function getPermissionTree()
    {
        $menu_tree = Permissions::whereIsShow(Permissions::SHOW_YES)->get()->toTree()->toArray();
        return $menu_tree;
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
                (new Permissions($data))->saveAsRoot();
            }else{
                Permissions::create($data,Permissions::whereId($data['parent_id'])->first());
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
        $menu = Permissions::whereId($menu_id)->first();
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
        $menu = Permissions::whereId($data['id'])->first();
        if(is_null($menu)){
            throw new InvalidRequestException('菜单不存在',Coding::HTTP_ERROR);
        }
        $menu_id = $data['id'];
        unset($data['id']);

        if($data['parent_id'] == $menu->id){
            throw new InvalidRequestException('不可选择自己为父级菜单',Coding::HTTP_ERROR);
        }
        if($data['parent_id'] == $menu->parent_id){
            Permissions::whereId($menu_id)->update($data);
            return true;
        }
        if($menu->parent_id == 0 && !empty($menu->descendants)){
            throw new InvalidRequestException('菜单下有子菜单存在，不能修改父级',Coding::HTTP_ERROR);
        }

        $menu->delete();
        if($data['parent_id'] == 0){
            (new Permissions($data))->saveAsRoot();
            return true;
        }

        Permissions::create($data,Permissions::whereId($data['parent_id'])->first());
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
        $menu = Permissions::whereId($id)->first();
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

    /**
     * 根绝指定id获取权限数值
     * @param array $ids
     * @return bool
     * @throws InvalidRequestException
     */
    public function getPartMenu(array $ids)
    {
        $ids_count = count($ids);
        $permission_num = Permission::whereIn('id',$ids)->count();
        if($ids_count != $permission_num){
            throw new InvalidRequestException('参数有误',Coding::HTTP_ERROR);
        }
        return true;
    }
}


