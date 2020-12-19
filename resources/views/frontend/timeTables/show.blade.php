@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.timeTable.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.time-tables.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeTable.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $timeTable->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeTable.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $timeTable->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeTable.fields.program') }}
                                    </th>
                                    <td>
                                        {{ $timeTable->program->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeTable.fields.semester') }}
                                    </th>
                                    <td>
                                        {{ $timeTable->semester }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeTable.fields.year') }}
                                    </th>
                                    <td>
                                        {{ $timeTable->year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeTable.fields.exam_available_days') }}
                                    </th>
                                    <td>
                                        {{ $timeTable->exam_available_days->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeTable.fields.start_time') }}
                                    </th>
                                    <td>
                                        {{ $timeTable->start_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeTable.fields.academic_year') }}
                                    </th>
                                    <td>
                                        {{ $timeTable->academic_year->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.time-tables.index') }}">
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