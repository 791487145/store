<?php
/**
 * Created by PhpStorm.
 * User: 24343
 * Date: 2020/12/8
 * Time: 19:02
 */

namespace App\Traits;


use Illuminate\Support\Facades\Redis;
use App\Lib\Coding;

trait Common
{

    /**
     * 生成防止表单重复提交凭证
     */
    public function createToken()
    {
        $token = md5(env('TOKEN_KEY').microtime());
        Redis::sadd(Coding::REDIS_FORM_TOKEN,$token);
        return $token;
    }


    /**
     * 一维数据数组生成数据树
     * @param array $list 数据列表
     * @param string $id 父ID Key
     * @param string $pid ID Key
     * @param string $son 定义子数据Key
     * @return Collection
     */
    public function arr2tree($list, $id = 'id', $pid = 'pid', $son = 'sub')
    {
        list($tree, $map) = [[], []];
        foreach ($list as $item) {
            $map[$item[$id]] = $item;
        }

        foreach ($list as $item) {
            if (isset($item[$pid]) && isset($map[$item[$pid]])) {
                $map[$item[$pid]][$son][] = &$map[$item[$id]];
            } else {
                $tree[] = &$map[$item[$id]];
            }
        }
        unset($map);
        return $tree;
    }

    /**
     * 一维数据数组生成数据树
     * @param array $list 数据列表
     * @param string $id ID Key
     * @param string $pid 父ID Key
     * @param string $path
     * @param string $ppath
     * @return array
     */
    public function arr2table(array $list, $id = 'id', $pid = 'parent_id', $path = 'path', $ppath = '')
    {
        $tree = [];
        foreach (self::arr2tree($list, $id, $pid) as $attr) {
            $attr[$path] = "{$ppath}-{$attr[$id]}";
            $attr['sub'] = isset($attr['sub']) ? $attr['sub'] : [];
            $attr['spt'] = substr_count($ppath, '-');
            $attr['spl'] = str_repeat("　├　", $attr['spt']);
            $sub         = $attr['sub'];
            unset($attr['sub']);
            $tree[] = $attr;
            if (!empty($sub)) {
                $tree = array_merge($tree, self::arr2table($sub, $id, $pid, $path, $attr[$path]));
            }
        }
        return $tree;
    }

    /**
     * 序列化数据
     * @param array $res
     * @param array $fixed
     * @return array
     */
    public function standardizedToData(array $res,array $fixed)
    {
        $datas = [];
        foreach ($res as $value){
            $data = [
                'id' => $value['id'],
                'title' => $value['name'],
                'children' => [],
                'spread' => true
            ];
            if(!empty($value['children'])){

                $children = [];
                foreach ($value['children'] as $val){
                    $child = [
                        'id' => $val['id'],
                        'title' => $val['name'],
                        'children' => [],
                        'spread' => true
                    ];
                    if(!empty($val['children'])){

                        $result = [];
                        foreach ($val['children'] as $v){

                            $res = [
                                'id' => $v['id'],
                                'title' => $v['name'],
                            ];
                            if(in_array($val['id'],$fixed)){
                                $res['checked'] = true;
                            }
                            $result[] = $res;
                        }
                        $child['children'] = $result;

                    }elseif(in_array($val['id'],$fixed)){

                        $child['checked'] = true;
                    }

                    $children[] = $child;
                }

                $data['children'] = $children;

            }elseif (in_array($value['id'],$fixed)){

                $data['checked'] = true;

            }

            $datas[] = $data;
        }

        return $data;
    }

    /**
     * openssl解密
     * @param $data
     * @return mixed
     */
    public function openssl($data)
    {
        $private_pem = file_get_contents(public_path('private_pem/rsa_private_key.pem'));
        openssl_private_decrypt(base64_decode($data),$res,$private_pem);
        return $res;
    }
}
