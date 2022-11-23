<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $query
 */
class AirportSearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "query" => 'required|string',
        ];
    }
}
