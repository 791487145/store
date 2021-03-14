<?php
namespace App\Services;


use App\Model\User;
use Illuminate\Support\Facades\Crypt;

class UsersServices
{
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
}