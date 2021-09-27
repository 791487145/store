<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidRequestException;
use App\Lib\Coding;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'     =>     'required|unique:roles',
        ];
    }


    public function messages()
    {
        return $message = [
            'name.required'  =>   '角色名不能为空',
            'name.unique'  =>     '角色名已存在',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new InvalidRequestException($error,Coding::HTTP_ERROR);
    }
}
