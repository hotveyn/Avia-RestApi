<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AirportSearchRequest extends FormRequest
{
    public function rules()
    {
        return [
            "query" => 'required|string',
        ];
    }
}