<?php

namespace App\Http\Requests;


/**
 * @property string $from
 * @property string $to
 * @property string $date1
 * @property string $date2
 * @property int $passengers
 */
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

