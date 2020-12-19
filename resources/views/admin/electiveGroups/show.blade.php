@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.electiveGroup.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.elective-groups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.id') }}
                        </th>
                        <td>
                            {{ $electiveGroup->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.programs') }}
                        </th>
                        <td>
                            @foreach($electiveGroup->programs as $key => $programs)
                                <span class="label label-info">{{ $programs->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.name') }}
                        </th>
                        <td>
                            {{ $electiveGroup->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.offered_subjects_in_group') }}
                        </th>
                        <td>
                            {{ $electiveGroup->offered_subjects_in_group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.max_subjects_allowed') }}
                        </th>
                        <td>
                            {{ $electiveGroup->max_subjects_allowed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.electiveGroup.fields.min_subjects_required') }}
                        </th>
                        <td>
                            {{ $electiveGroup->min_subjects_required }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.elective-groups.index') }}">
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
            <a class="nav-link" href="#elective_group_subjects" role="tab" data-toggle="tab">
                {{ trans('cruds.subject.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="elective_group_subjects">
            @includeIf('admin.electiveGroups.relationships.electiveGroupSubjects', ['subjects' => $electiveGroup->electiveGroupSubjects])
        </div>
    </div>
</div>

@endsection