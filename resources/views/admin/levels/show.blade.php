@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.level.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.levels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.level.fields.id') }}
                        </th>
                        <td>
                            {{ $level->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.level.fields.name') }}
                        </th>
                        <td>
                            {{ $level->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.level.fields.code') }}
                        </th>
                        <td>
                            {{ $level->code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.levels.index') }}">
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
            <a class="nav-link" href="#level_programs" role="tab" data-toggle="tab">
                {{ trans('cruds.program.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="level_programs">
            @includeIf('admin.levels.relationships.levelPrograms', ['programs' => $level->levelPrograms])
        </div>
    </div>
</div>

@endsection