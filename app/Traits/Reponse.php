<?php
/**
 * Created by PhpStorm.
 * User: 24343
 * Date: 2020/12/8
 * Time: 19:02
 */

namespace App\Traits;


trait Reponse
{
    public $code = 200;
    public $error = 201;

    /**
     * 成功时返回值
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public  function success($msg = '')
    {
        return response()->json(['msg' => $msg,'code'=>$this->code]);
    }

    /**
     * 错误返回值
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function fail($msg){
        return response()->json(['msg' => $msg,'code'=>$this->error]);
    }
}