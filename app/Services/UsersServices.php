<?php
namespace App\Services;


use App\Model\User;
use Illuminate\Support\Facades\Crypt;

class UsersServices
{
    public function userCreate($data)
    {
        $data['password'] =  Crypt::encryptString($data['password']);
        return User::create($data);
    }
}