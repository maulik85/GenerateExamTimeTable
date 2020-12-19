@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.electiveGroup.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.elective-groups.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.elective-groups.index') }}">
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