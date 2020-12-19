<?php

namespace App\Http\Requests;

use App\Models\ElectiveGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateElectiveGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('elective_group_edit');
    }

    public function rules()
    {
        return [
            'programs.*'                => [
                'integer',
            ],
            'programs'                  => [
                'array',
            ],
            'name'                      => [
                'string',
                'required',
            ],
            'offered_subjects_in_group' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'max_subjects_allowed'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'min_subjects_required'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
