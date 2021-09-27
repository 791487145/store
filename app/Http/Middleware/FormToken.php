<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidRequestException;
use Closure;
use Illuminate\Support\Facades\Redis;
use App\Lib\Coding;

class FormToken
{
    /**
     * 判断表单是否重复提交
     * Handle an incoming request
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $request->post('form_token','');

        //form_token不存在
        if(empty($data)){
            throw new InvalidRequestException(Coding::MSG_FORM_MISS_TOKEN,Coding::HTTP_FORM_MISS_TOKEN);
        }

        //form_token存在
        if(Redis::sismember('form_token',$data)){
            Redis::srem('form_token',$data);
        }else{
            throw new InvalidRequestException(Coding::MSG_FORM_TOKEN,Coding::HTTP_FORM_CODE);
        };

        return $next($request);
    }
}
