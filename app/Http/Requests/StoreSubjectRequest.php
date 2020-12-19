<?php

namespace App\Http\Requests;

use App\Models\Subject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subject_create');
    }

    public function rules()
    {
        return [
            'programs.*'                   => [
                'integer',
            ],
            'programs'                     => [
                'required',
                'array',
            ],
            'semester'                     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'year'                         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'category'                     => [
                'string',
                'nullable',
            ],
            'code'                         => [
                'string',
                'required',
            ],
            'title'                        => [
                'string',
                'required',
            ],
            'type'                         => [
                'required',
            ],
            'credits'                      => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'classroom_hours'              => [
                'string',
                'nullable',
            ],
            'tutorial_hours'               => [
                'string',
                'nullable',
            ],
            'lab_hours'                    => [
                'string',
                'nullable',
            ],
            'theory_exam_hours'            => [
                'string',
                'nullable',
            ],
            'practical_exam_hours'         => [
                'string',
                'nullable',
            ],
            'theory_intl_marks'            => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'theory_intl_passing_marks'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'theory_ext_marks'             => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'theory_ext_passing_marks'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'practical_intl_marks'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'practical_intl_passing_marks' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'practical_ext_marks'          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'practical_ext_passing_marks'  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_marks'                  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_passing_marks'          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'elective_groups.*'            => [
                'integer',
            ],
            'elective_groups'              => [
                'array',
            ],
        ];
    }
}
