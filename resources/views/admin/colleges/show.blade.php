@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.college.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.colleges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.id') }}
                        </th>
                        <td>
                            {{ $college->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.name') }}
                        </th>
                        <td>
                            {{ $college->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.college.fields.code') }}
                        </th>
                        <td>
                            {{ $college->code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.colleges.index') }}">
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
            <a class="nav-link" href="#college_programs" role="tab" data-toggle="tab">
                {{ trans('cruds.program.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="college_programs">
            @includeIf('admin.colleges.relationships.collegePrograms', ['programs' => $college->collegePrograms])
        </div>
    </div>
</div>

@endsection