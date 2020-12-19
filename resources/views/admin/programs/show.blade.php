@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.program.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.id') }}
                        </th>
                        <td>
                            {{ $program->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.title') }}
                        </th>
                        <td>
                            {{ $program->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.code') }}
                        </th>
                        <td>
                            {{ $program->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.category') }}
                        </th>
                        <td>
                            {{ $program->category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.faculty') }}
                        </th>
                        <td>
                            {{ $program->faculty->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.college') }}
                        </th>
                        <td>
                            @foreach($program->colleges as $key => $college)
                                <span class="label label-info">{{ $college->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.level') }}
                        </th>
                        <td>
                            {{ $program->level->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programs.index') }}">
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
            <a class="nav-link" href="#program_time_tables" role="tab" data-toggle="tab">
                {{ trans('cruds.timeTable.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#program_subjects" role="tab" data-toggle="tab">
                {{ trans('cruds.subject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#programs_elective_groups" role="tab" data-toggle="tab">
                {{ trans('cruds.electiveGroup.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="program_time_tables">
            @includeIf('admin.programs.relationships.programTimeTables', ['timeTables' => $program->programTimeTables])
        </div>
        <div class="tab-pane" role="tabpanel" id="program_subjects">
            @includeIf('admin.programs.relationships.programSubjects', ['subjects' => $program->programSubjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="programs_elective_groups">
            @includeIf('admin.programs.relationships.programsElectiveGroups', ['electiveGroups' => $program->programsElectiveGroups])
        </div>
    </div>
</div>

@endsection