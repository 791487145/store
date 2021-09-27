<?php

namespace App\Http\Requests;

use App\Lib\Coding;
use App\Exceptions\InvalidRequestException;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function validationData()
    {
        $data = $this->request->all('data');
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     =>     'required|unique:menu',
            'sort'     =>     'numeric|min:0',
            'parent_id'     =>     'numeric|min:0',
        ];
    }


    public function messages()
    {
        return $message = [
            'name.required'  =>   '菜单名不能为空',
            'name.unique'  =>     '菜单名已存在',
            'sort.numeric'  =>     '排序值只能为数字',
            'sort.min'  =>     '排序值最小为0',
            'parent_id.numeric'  =>     '上级菜单编号只能为数字',
            'parent_id.min'  =>     '上级菜单编号最小为0',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new InvalidRequestException($error,Coding::HTTP_ERROR);
    }
}
