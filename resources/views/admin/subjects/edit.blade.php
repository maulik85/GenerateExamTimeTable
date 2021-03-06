@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subjects.update", [$subject->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="programs">{{ trans('cruds.subject.fields.program') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('programs') ? 'is-invalid' : '' }}" name="programs[]" id="programs" multiple required>
                    @foreach($programs as $id => $program)
                        <option value="{{ $id }}" {{ (in_array($id, old('programs', [])) || $subject->programs->contains($id)) ? 'selected' : '' }}>{{ $program }}</option>
                    @endforeach
                </select>
                @if($errors->has('programs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('programs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.program_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="semester">{{ trans('cruds.subject.fields.semester') }}</label>
                <input class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}" type="number" name="semester" id="semester" value="{{ old('semester', $subject->semester) }}" step="1">
                @if($errors->has('semester'))
                    <div class="invalid-feedback">
                        {{ $errors->first('semester') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.semester_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.subject.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="number" name="year" id="year" value="{{ old('year', $subject->year) }}" step="1">
                @if($errors->has('year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category">{{ trans('cruds.subject.fields.category') }}</label>
                <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category" id="category" value="{{ old('category', $subject->category) }}">
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.subject.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $subject->code) }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.subject.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $subject->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.subject.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Subject::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $subject->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="credits">{{ trans('cruds.subject.fields.credits') }}</label>
                <input class="form-control {{ $errors->has('credits') ? 'is-invalid' : '' }}" type="number" name="credits" id="credits" value="{{ old('credits', $subject->credits) }}" step="1" required>
                @if($errors->has('credits'))
                    <div class="invalid-feedback">
                        {{ $errors->first('credits') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.credits_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="classroom_hours">{{ trans('cruds.subject.fields.classroom_hours') }}</label>
                <input class="form-control {{ $errors->has('classroom_hours') ? 'is-invalid' : '' }}" type="text" name="classroom_hours" id="classroom_hours" value="{{ old('classroom_hours', $subject->classroom_hours) }}">
                @if($errors->has('classroom_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classroom_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.classroom_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tutorial_hours">{{ trans('cruds.subject.fields.tutorial_hours') }}</label>
                <input class="form-control {{ $errors->has('tutorial_hours') ? 'is-invalid' : '' }}" type="text" name="tutorial_hours" id="tutorial_hours" value="{{ old('tutorial_hours', $subject->tutorial_hours) }}">
                @if($errors->has('tutorial_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tutorial_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.tutorial_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lab_hours">{{ trans('cruds.subject.fields.lab_hours') }}</label>
                <input class="form-control {{ $errors->has('lab_hours') ? 'is-invalid' : '' }}" type="text" name="lab_hours" id="lab_hours" value="{{ old('lab_hours', $subject->lab_hours) }}">
                @if($errors->has('lab_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lab_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.lab_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="theory_exam_hours">{{ trans('cruds.subject.fields.theory_exam_hours') }}</label>
                <input class="form-control {{ $errors->has('theory_exam_hours') ? 'is-invalid' : '' }}" type="text" name="theory_exam_hours" id="theory_exam_hours" value="{{ old('theory_exam_hours', $subject->theory_exam_hours) }}">
                @if($errors->has('theory_exam_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('theory_exam_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.theory_exam_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="practical_exam_hours">{{ trans('cruds.subject.fields.practical_exam_hours') }}</label>
                <input class="form-control {{ $errors->has('practical_exam_hours') ? 'is-invalid' : '' }}" type="text" name="practical_exam_hours" id="practical_exam_hours" value="{{ old('practical_exam_hours', $subject->practical_exam_hours) }}">
                @if($errors->has('practical_exam_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('practical_exam_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.practical_exam_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="theory_intl_marks">{{ trans('cruds.subject.fields.theory_intl_marks') }}</label>
                <input class="form-control {{ $errors->has('theory_intl_marks') ? 'is-invalid' : '' }}" type="number" name="theory_intl_marks" id="theory_intl_marks" value="{{ old('theory_intl_marks', $subject->theory_intl_marks) }}" step="1">
                @if($errors->has('theory_intl_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('theory_intl_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.theory_intl_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="theory_intl_passing_marks">{{ trans('cruds.subject.fields.theory_intl_passing_marks') }}</label>
                <input class="form-control {{ $errors->has('theory_intl_passing_marks') ? 'is-invalid' : '' }}" type="number" name="theory_intl_passing_marks" id="theory_intl_passing_marks" value="{{ old('theory_intl_passing_marks', $subject->theory_intl_passing_marks) }}" step="1">
                @if($errors->has('theory_intl_passing_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('theory_intl_passing_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.theory_intl_passing_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="theory_ext_marks">{{ trans('cruds.subject.fields.theory_ext_marks') }}</label>
                <input class="form-control {{ $errors->has('theory_ext_marks') ? 'is-invalid' : '' }}" type="number" name="theory_ext_marks" id="theory_ext_marks" value="{{ old('theory_ext_marks', $subject->theory_ext_marks) }}" step="1">
                @if($errors->has('theory_ext_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('theory_ext_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.theory_ext_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="theory_ext_passing_marks">{{ trans('cruds.subject.fields.theory_ext_passing_marks') }}</label>
                <input class="form-control {{ $errors->has('theory_ext_passing_marks') ? 'is-invalid' : '' }}" type="number" name="theory_ext_passing_marks" id="theory_ext_passing_marks" value="{{ old('theory_ext_passing_marks', $subject->theory_ext_passing_marks) }}" step="1">
                @if($errors->has('theory_ext_passing_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('theory_ext_passing_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.theory_ext_passing_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="practical_intl_marks">{{ trans('cruds.subject.fields.practical_intl_marks') }}</label>
                <input class="form-control {{ $errors->has('practical_intl_marks') ? 'is-invalid' : '' }}" type="number" name="practical_intl_marks" id="practical_intl_marks" value="{{ old('practical_intl_marks', $subject->practical_intl_marks) }}" step="1">
                @if($errors->has('practical_intl_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('practical_intl_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.practical_intl_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="practical_intl_passing_marks">{{ trans('cruds.subject.fields.practical_intl_passing_marks') }}</label>
                <input class="form-control {{ $errors->has('practical_intl_passing_marks') ? 'is-invalid' : '' }}" type="number" name="practical_intl_passing_marks" id="practical_intl_passing_marks" value="{{ old('practical_intl_passing_marks', $subject->practical_intl_passing_marks) }}" step="1">
                @if($errors->has('practical_intl_passing_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('practical_intl_passing_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.practical_intl_passing_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="practical_ext_marks">{{ trans('cruds.subject.fields.practical_ext_marks') }}</label>
                <input class="form-control {{ $errors->has('practical_ext_marks') ? 'is-invalid' : '' }}" type="number" name="practical_ext_marks" id="practical_ext_marks" value="{{ old('practical_ext_marks', $subject->practical_ext_marks) }}" step="1">
                @if($errors->has('practical_ext_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('practical_ext_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.practical_ext_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="practical_ext_passing_marks">{{ trans('cruds.subject.fields.practical_ext_passing_marks') }}</label>
                <input class="form-control {{ $errors->has('practical_ext_passing_marks') ? 'is-invalid' : '' }}" type="number" name="practical_ext_passing_marks" id="practical_ext_passing_marks" value="{{ old('practical_ext_passing_marks', $subject->practical_ext_passing_marks) }}" step="1">
                @if($errors->has('practical_ext_passing_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('practical_ext_passing_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.practical_ext_passing_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_marks">{{ trans('cruds.subject.fields.total_marks') }}</label>
                <input class="form-control {{ $errors->has('total_marks') ? 'is-invalid' : '' }}" type="number" name="total_marks" id="total_marks" value="{{ old('total_marks', $subject->total_marks) }}" step="1">
                @if($errors->has('total_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.total_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_passing_marks">{{ trans('cruds.subject.fields.total_passing_marks') }}</label>
                <input class="form-control {{ $errors->has('total_passing_marks') ? 'is-invalid' : '' }}" type="number" name="total_passing_marks" id="total_passing_marks" value="{{ old('total_passing_marks', $subject->total_passing_marks) }}" step="1">
                @if($errors->has('total_passing_marks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_passing_marks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.total_passing_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('elective') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="elective" value="0">
                    <input class="form-check-input" type="checkbox" name="elective" id="elective" value="1" {{ $subject->elective || old('elective', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="elective">{{ trans('cruds.subject.fields.elective') }}</label>
                </div>
                @if($errors->has('elective'))
                    <div class="invalid-feedback">
                        {{ $errors->first('elective') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.elective_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="elective_groups">{{ trans('cruds.subject.fields.elective_group') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('elective_groups') ? 'is-invalid' : '' }}" name="elective_groups[]" id="elective_groups" multiple>
                    @foreach($elective_groups as $id => $elective_group)
                        <option value="{{ $id }}" {{ (in_array($id, old('elective_groups', [])) || $subject->elective_groups->contains($id)) ? 'selected' : '' }}>{{ $elective_group }}</option>
                    @endforeach
                </select>
                @if($errors->has('elective_groups'))
                    <div class="invalid-feedback">
                        {{ $errors->first('elective_groups') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.elective_group_helper') }}</span>
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