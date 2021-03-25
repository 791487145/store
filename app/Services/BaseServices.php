<?php
namespace App\Services;


use Illuminate\Http\Request;

class BaseServices
{
    private $limit = 10;

    /**
     * 获取分页数据
     * @return array
     */
    public function getPage()
    {
        $data = request()->only(['page','limit']);

        $page = isset($data['page']) ? $data['page'] : 1;
        $limit = isset($data['limit']) ? $data['limit'] : $this->limit;

        if(empty($page) || !is_numeric($page)){
            $page = 1;
        }
        if(empty($limit) || !is_numeric($limit)){
            $limit = $this->limit;
        }

        return [$page,$limit];
    }

}
