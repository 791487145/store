<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidRequestException;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'     =>     'required|unique:users',
            'mobile'   =>     'required|unique:users',
            'email'   =>      'required|unique:users',
            'password'  =>    'required'
        ];
    }


    public function messages()
    {
        return $message = [
            'name.required'  =>   '用户名不能为空',
            'name.unique'  =>     '用户名已注册',
            'mobile.unique'  =>     '手机号已注册',
            'mobile.required'  =>     '手机号不能为空',
            'email.unique'  =>     '邮箱已注册',
            'email.required'  =>     '邮箱不能为空',
            'password.password'  =>     '用户名已注册',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new InvalidRequestException($error);
    }


}
