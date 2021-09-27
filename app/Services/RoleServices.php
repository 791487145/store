<?php
namespace App\Services;


use App\Exceptions\InvalidRequestException;
use App\Http\Requests\RoleRequest;
use App\Lib\Coding;
use App\Model\Roles;
use App\Model\User;
use App\Traits\Common;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\True_;
use Illuminate\Support\Facades\DB;

class RoleServices extends BaseServices
{
    use Common;
    /**
     * 角色创建
     * @param $data
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function roleCreate(array $data)
    {
        $role_data = [
            'name' => $data['name'],
            'describe' => $data['describe']
        ];
        Roles::create($role_data);
        return true;
    }

    /**
     * 获取用户列表
     * @return array
     */
    public function getRoleLists($name)
    {
        [$page, $limit] = $this->getPage();

        $role = Roles::query();
        if (!empty($name)) {
            $role = $role->where('name', 'like', '%' . $name . '%');
        }

        $count = $role->count();
        $user = $role->forPage($page, $limit)->get()->toArray();

        return [$user, $count];
    }

    /**
     * 获取某条角色数据
     * @param int $id
     * @throws InvalidRequestException
     */
    public function getOneRole(int $id)
    {
        $role = Roles::whereId($id)->first();
        if (is_null($role)) {
            throw new InvalidRequestException('参数有误', Coding::HTTP_ERROR);
        }

        return $role;
    }

    /**
     * 角色编辑
     * @param array $data
     * @return bool
     * @throws InvalidRequestException
     */
    public function roleUpdate(array $data)
    {
        $role = $this->getOneRole($data['id']);
        unset($data['id']);
        $role->update($data);
        return true;
    }

    /**
     * 角色状态修改
     * @param array $data
     * @return bool
     * @throws InvalidRequestException
     */
    public function roleStatus(array $data)
    {
        $role = $this->getOneRole($data['id']);
        $is_use = $data['is_use'];
        if ($is_use == Roles::USE_END) {
            $role->update(['is_use' => Roles::USE_START]);
        } else {
            if ($role->users()->exists()) {
                throw new InvalidRequestException('角色上有用户存在，不可禁用', Coding::HTTP_ERROR);
            }
            $role->update(['is_use' => Roles::USE_END]);
        }
        return true;

    }

    /**
     * 角色删除
     * @param int $id
     * @return bool
     * @throws InvalidRequestException
     * @throws \Throwable
     */
    public function roleDelete(int $id)
    {
        $role = $this->getOneRole($id);
        if($role->users->isNotEmpty()){
            throw new InvalidRequestException('角色上有用户存在，不可删除', Coding::HTTP_ERROR);
        }
        if($role->permissions->isNotEmpty()){
            throw new InvalidRequestException('角色下有权限存在，不可删除', Coding::HTTP_ERROR);
        }

        DB::beginTransaction();
        $res1 = $role->users()->detach();
        $res2 = $role->permissions()->detach();
        $res3 = $role->delete();

        if($res1 && $res2 && $res3){
            DB::commit();
        }else{
            DB::rollBack();
            throw new InvalidRequestException('系统错误，请稍后再试', Coding::HTTP_ERROR);
        }
        return true;
    }

    /**
     * 获取所有角色
     * @return Roles[]|\Illuminate\Database\Eloquent\Collection
     */
    public function roleData()
    {
        return Roles::whereIsUse(Roles::USE_START)->get();
    }

    /**
     * 获取角色权限数据
     * @param int $id
     * @return array
     * @throws InvalidRequestException
     */
    public function rolePermission(int $id)
    {
        $role = $this->getOneRole($id);
        $role_permission_ids = $role->permissions->pluck('id')->toArray();
        $menus = (new PermissionServices())->getPermissionTree();
        $menus = $this->standardizedToData($menus,$role_permission_ids);

        return [$role,$menus];
    }

    public function roleAssignPermission(int $role_id,array $permission_ids)
    {
        $role = $this->getOneRole($role_id);
        $permissionService = new PermissionServices();
        $permissionService->getPartMenu($permission_ids);
        $role->syncPermissions($permission_ids);
    }


}
