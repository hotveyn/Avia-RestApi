<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            "passenger" => "integer|required",
            "seat" => "string|required",
            "type" => "string|required"
        ];
    }
}
