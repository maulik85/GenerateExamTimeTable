<?php

namespace App\Http\Requests;

use App\Models\TimeTable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTimeTableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('time_table_edit');
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'required',
            ],
            'program_id' => [
                'required',
                'integer',
            ],
            'semester'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'year'       => [
                'string',
                'nullable',
            ],
            'start_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
