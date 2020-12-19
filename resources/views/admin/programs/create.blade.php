@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.program.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.programs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.program.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.program.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category">{{ trans('cruds.program.fields.category') }}</label>
                <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category" id="category" value="{{ old('category', '') }}">
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="faculty_id">{{ trans('cruds.program.fields.faculty') }}</label>
                <select class="form-control select2 {{ $errors->has('faculty') ? 'is-invalid' : '' }}" name="faculty_id" id="faculty_id">
                    @foreach($faculties as $id => $faculty)
                        <option value="{{ $id }}" {{ old('faculty_id') == $id ? 'selected' : '' }}>{{ $faculty }}</option>
                    @endforeach
                </select>
                @if($errors->has('faculty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faculty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.faculty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="colleges">{{ trans('cruds.program.fields.college') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('colleges') ? 'is-invalid' : '' }}" name="colleges[]" id="colleges" multiple>
                    @foreach($colleges as $id => $college)
                        <option value="{{ $id }}" {{ in_array($id, old('colleges', [])) ? 'selected' : '' }}>{{ $college }}</option>
                    @endforeach
                </select>
                @if($errors->has('colleges'))
                    <div class="invalid-feedback">
                        {{ $errors->first('colleges') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.college_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="level_id">{{ trans('cruds.program.fields.level') }}</label>
                <select class="form-control select2 {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level_id" id="level_id">
                    @foreach($levels as $id => $level)
                        <option value="{{ $id }}" {{ old('level_id') == $id ? 'selected' : '' }}>{{ $level }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.program.fields.level_helper') }}</span>
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