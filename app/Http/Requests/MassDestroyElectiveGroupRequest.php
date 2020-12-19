<?php

namespace App\Http\Requests;

use App\Models\ElectiveGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyElectiveGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('elective_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:elective_groups,id',
        ];
    }
}
