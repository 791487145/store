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
    public $code = 0;
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
     * 成功时带参数返回值
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public  function success_data(array $data)
    {
        return response()->json(['msg' => '操作成功','code'=>$this->code,'data'=>$data]);
    }

    /**
     * 成功时带参数返回值（分页）
     * @param array $data
     * @param int $count
     * @return \Illuminate\Http\JsonResponse
     */
    public  function success_page(array $data,int $count)
    {
        return response()->json(['msg' => '操作成功','code'=>$this->code,'data'=>$data,'count'=>$count]);
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
