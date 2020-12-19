<?php

namespace App\Http\Requests;

use App\Models\College;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCollegeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('college_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
