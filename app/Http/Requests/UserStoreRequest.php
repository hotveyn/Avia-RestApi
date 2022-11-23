<?php

namespace App\Http\Requests;

/**
 * @property string $first_name
 * @property string $last_name
 * @property int $phone
 * @property string $password
 * @property int $document_number
 */
class UserStoreRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            "first_name" => "required|string",
            "last_name" => "required|string",
            "phone" => "required|integer|unique:users,phone",
            "password" => "required|string",
            "document_number" => "required|integer"
        ];
    }
}
