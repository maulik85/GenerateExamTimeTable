<?php

namespace App\Http\Requests;

use App\Models\Program;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProgramRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('program_create');
    }

    public function rules()
    {
        return [
            'title'      => [
                'string',
                'required',
            ],
            'code'       => [
                'string',
                'required',
            ],
            'category'   => [
                'string',
                'nullable',
            ],
            'colleges.*' => [
                'integer',
            ],
            'colleges'   => [
                'array',
            ],
        ];
    }
}
