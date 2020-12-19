@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.timeTable.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-tables.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.timeTable.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeTable.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="program_id">{{ trans('cruds.timeTable.fields.program') }}</label>
                <select class="form-control select2 {{ $errors->has('program') ? 'is-invalid' : '' }}" name="program_id" id="program_id" required>
                    @foreach($programs as $id => $program)
                        <option value="{{ $id }}" {{ old('program_id') == $id ? 'selected' : '' }}>{{ $program }}</option>
                    @endforeach
                </select>
                @if($errors->has('program'))
                    <div class="invalid-feedback">
                        {{ $errors->first('program') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeTable.fields.program_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="semester">{{ trans('cruds.timeTable.fields.semester') }}</label>
                <input class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}" type="number" name="semester" id="semester" value="{{ old('semester', '') }}" step="1">
                @if($errors->has('semester'))
                    <div class="invalid-feedback">
                        {{ $errors->first('semester') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeTable.fields.semester_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.timeTable.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year', '') }}">
                @if($errors->has('year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeTable.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="exam_available_days_id">{{ trans('cruds.timeTable.fields.exam_available_days') }}</label>
                <select class="form-control select2 {{ $errors->has('exam_available_days') ? 'is-invalid' : '' }}" name="exam_available_days_id" id="exam_available_days_id">
                    @foreach($exam_available_days as $id => $exam_available_days)
                        <option value="{{ $id }}" {{ old('exam_available_days_id') == $id ? 'selected' : '' }}>{{ $exam_available_days }}</option>
                    @endforeach
                </select>
                @if($errors->has('exam_available_days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exam_available_days') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeTable.fields.exam_available_days_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_time">{{ trans('cruds.timeTable.fields.start_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}">
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeTable.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="academic_year_id">{{ trans('cruds.timeTable.fields.academic_year') }}</label>
                <select class="form-control select2 {{ $errors->has('academic_year') ? 'is-invalid' : '' }}" name="academic_year_id" id="academic_year_id">
                    @foreach($academic_years as $id => $academic_year)
                        <option value="{{ $id }}" {{ old('academic_year_id') == $id ? 'selected' : '' }}>{{ $academic_year }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('academic_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeTable.fields.academic_year_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection