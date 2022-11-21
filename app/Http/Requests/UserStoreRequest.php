<?php

namespace App\Http\Requests;

class UserStoreRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            "first_name" => "required",
            "last_name" => "required",
            "phone" => "required|unique:users,phone",
            "password" => "required",
            "document_number" => "required"
        ];
    }
}
