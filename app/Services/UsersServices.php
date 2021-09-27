<?php
namespace App\Services;


use App\Exceptions\InvalidRequestException;
use App\Lib\Coding;
use App\Model\User;
use Illuminate\Support\Facades\Crypt;

class UsersServices extends BaseServices
{
    /**
     * 用户创建
     * @param $data
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function userCreate($data)
    {
        $data['password'] =  encrypt($data['password']);
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

    /**
     * 获取某条用户数据
     * @param int $id
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     * @throws InvalidRequestException
     */
    public function getOneUser(int $id)
    {
        $user = User::whereId($id)->first();
        if(is_null($user)){
            throw new InvalidRequestException('参数有误',Coding::HTTP_ERROR);
        }
        return $user;
    }

    /**
     * 获取用户角色相关数据
     * @param int $id
     * @return array
     * @throws InvalidRequestException
     */
    public function userRole(int $id)
    {
        $user = $this->getOneUser($id);
        $roles = (new RoleServices)->roleData();
        return [$user,$roles];
    }

    /**
     * 给用户分配角色
     * @param int $id
     * @param int $role_id
     * @return bool
     * @throws InvalidRequestException
     */
    public function userAssignRole(int $id,int $role_id)
    {
        $user = $this->getOneUser($id);
        $role_service = new RoleServices();
        $role = $role_service->getOneRole($role_id);
        $user->assignRole($role);
        return true;
    }

}
