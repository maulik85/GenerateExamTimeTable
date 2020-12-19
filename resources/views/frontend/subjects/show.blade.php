@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.subject.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.subjects.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $subject->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.program') }}
                                    </th>
                                    <td>
                                        @foreach($subject->programs as $key => $program)
                                            <span class="label label-info">{{ $program->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.semester') }}
                                    </th>
                                    <td>
                                        {{ $subject->semester }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.year') }}
                                    </th>
                                    <td>
                                        {{ $subject->year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $subject->category }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $subject->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $subject->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Subject::TYPE_SELECT[$subject->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.credits') }}
                                    </th>
                                    <td>
                                        {{ $subject->credits }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.classroom_hours') }}
                                    </th>
                                    <td>
                                        {{ $subject->classroom_hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.tutorial_hours') }}
                                    </th>
                                    <td>
                                        {{ $subject->tutorial_hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.lab_hours') }}
                                    </th>
                                    <td>
                                        {{ $subject->lab_hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.theory_exam_hours') }}
                                    </th>
                                    <td>
                                        {{ $subject->theory_exam_hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.practical_exam_hours') }}
                                    </th>
                                    <td>
                                        {{ $subject->practical_exam_hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.theory_intl_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->theory_intl_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.theory_intl_passing_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->theory_intl_passing_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.theory_ext_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->theory_ext_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.theory_ext_passing_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->theory_ext_passing_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.practical_intl_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->practical_intl_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.practical_intl_passing_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->practical_intl_passing_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.practical_ext_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->practical_ext_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.practical_ext_passing_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->practical_ext_passing_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.total_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->total_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.total_passing_marks') }}
                                    </th>
                                    <td>
                                        {{ $subject->total_passing_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.elective') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $subject->elective ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subject.fields.elective_group') }}
                                    </th>
                                    <td>
                                        @foreach($subject->elective_groups as $key => $elective_group)
                                            <span class="label label-info">{{ $elective_group->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.subjects.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection