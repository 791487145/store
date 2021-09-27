<?php
/**
 * Created by PhpStorm.
 * User: 24343
 * Date: 2020/12/8
 * Time: 19:02
 */

namespace App\Traits;

use App\Lib\Coding;

trait Reponse
{
    public $code = Coding::HTTP_SUCCESS;
    public $error = Coding::HTTP_ERROR;

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
     * 成功时带参数返回值
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public  function success_data(array $data)
    {
        return response()->json(['msg' => Coding::MSG_SUCCESS,'code'=>$this->code,'data'=>$data]);
    }

    /**
     * 成功时带参数返回值（分页或树）
     * @param array $data
     * @param int $count
     * @return \Illuminate\Http\JsonResponse
     */
    public  function success_page(array $data,int $count)
    {
        return response()->json(['msg' => Coding::MSG_SUCCESS,'code'=>$this->code,'data'=>$data,'count'=>$count]);
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
