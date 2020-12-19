<?php

namespace App\Http\Requests;

use App\Models\ExamAvailableDay;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExamAvailableDayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exam_available_day_edit');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
            ],
            'exam_start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'day_1'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_2'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_3'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_4'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_5'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_6'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_7'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_8'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_9'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_10'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_11'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_12'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_13'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_14'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'day_15'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
