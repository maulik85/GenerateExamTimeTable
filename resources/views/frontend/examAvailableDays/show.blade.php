@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.examAvailableDay.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.exam-available-days.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.exam_start_date') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->exam_start_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_1') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_2') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_3') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_4') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_4 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_5') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_5 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_6') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_6 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_7') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_7 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_8') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_8 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_9') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_9 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_10') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_10 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_11') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_11 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_12') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_12 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_13') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_13 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_14') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_14 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examAvailableDay.fields.day_15') }}
                                    </th>
                                    <td>
                                        {{ $examAvailableDay->day_15 }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.exam-available-days.index') }}">
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