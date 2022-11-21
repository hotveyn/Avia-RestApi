<?php

namespace App\Http\Requests;

class FlightSearchRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'from' => 'required|string',
            'to' => 'required|string',
            'date1' => 'required|date',
            'date2' => 'date',
            'passengers' => 'required|integer',
        ];
    }
}

