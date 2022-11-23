<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $type
 * @property string $seat
 * @property int $passenger
 */
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
