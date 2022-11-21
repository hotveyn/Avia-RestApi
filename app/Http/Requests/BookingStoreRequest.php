<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;

class BookingStoreRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            "flight_from" => [
                'required',
                'array',
                Rule::in([
                    "id" => "number",
                    "date" => "date"])
            ],
            "flight_back" => [
                'required',
                'array',
                Rule::in([
                    "id" => "number|required",
                    "date" => "date|required"])
            ],
            "passengers" => [
                'required',
                'array',
                Rule::in([
                    "first_name" => "string|required",
                    "last_name" => "string|required",
                    "birth_date" => "date|required",
                    "document_number" => "number|required|min:10|max:10"
                ])
            ],
        ];
    }
}
