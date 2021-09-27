<?php
/**
 * Created by PhpStorm.
 * User: 24343
 * Date: 2020/12/8
 * Time: 19:02
 */

namespace App\Lib;


use Illuminate\Support\Facades\Redis;

class Coding
{
    //redis
    const REDIS_FORM_TOKEN = 'form_token';//表单token


    //http
    const HTTP_SUCCESS = 0; //分页成功
    const HTTP_FORM_CODE = 1;//表单重复提交错误
    const HTTP_FORM_MISS_TOKEN = 2;//表单提交缺失token
    const HTTP_ERROR = 201;//错误



    //message
    const MSG_FORM_TOKEN = '请勿重复提交表单';
    const MSG_FORM_MISS_TOKEN = '表单token缺失';
    const MSG_SUCCESS = '操作成功';

}
