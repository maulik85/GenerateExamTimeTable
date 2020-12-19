@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.program.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.programs.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.programs.index') }}">
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