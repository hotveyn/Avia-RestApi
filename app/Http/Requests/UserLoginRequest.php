<?php

namespace App\Http\Requests;

class UserLoginRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'phone' => 'required|string|max:32|min:4',
            'password' => 'required|string|min:4',
        ];
    }

}
