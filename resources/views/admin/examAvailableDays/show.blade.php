@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.examAvailableDay.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exam-available-days.index') }}">
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
                <a class="btn btn-default" href="{{ route('admin.exam-available-days.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#exam_available_days_time_tables" role="tab" data-toggle="tab">
                {{ trans('cruds.timeTable.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="exam_available_days_time_tables">
            @includeIf('admin.examAvailableDays.relationships.examAvailableDaysTimeTables', ['timeTables' => $examAvailableDay->examAvailableDaysTimeTables])
        </div>
    </div>
</div>

@endsection