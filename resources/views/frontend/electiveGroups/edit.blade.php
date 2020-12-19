@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.electiveGroup.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.elective-groups.update", [$electiveGroup->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="programs">{{ trans('cruds.electiveGroup.fields.programs') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="programs[]" id="programs" multiple>
                                @foreach($programs as $id => $programs)
                                    <option value="{{ $id }}" {{ (in_array($id, old('programs', [])) || $electiveGroup->programs->contains($id)) ? 'selected' : '' }}>{{ $programs }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('programs'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('programs') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.electiveGroup.fields.programs_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.electiveGroup.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $electiveGroup->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.electiveGroup.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="offered_subjects_in_group">{{ trans('cruds.electiveGroup.fields.offered_subjects_in_group') }}</label>
                            <input class="form-control" type="number" name="offered_subjects_in_group" id="offered_subjects_in_group" value="{{ old('offered_subjects_in_group', $electiveGroup->offered_subjects_in_group) }}" step="1">
                            @if($errors->has('offered_subjects_in_group'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('offered_subjects_in_group') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.electiveGroup.fields.offered_subjects_in_group_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="max_subjects_allowed">{{ trans('cruds.electiveGroup.fields.max_subjects_allowed') }}</label>
                            <input class="form-control" type="number" name="max_subjects_allowed" id="max_subjects_allowed" value="{{ old('max_subjects_allowed', $electiveGroup->max_subjects_allowed) }}" step="1">
                            @if($errors->has('max_subjects_allowed'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('max_subjects_allowed') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.electiveGroup.fields.max_subjects_allowed_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="min_subjects_required">{{ trans('cruds.electiveGroup.fields.min_subjects_required') }}</label>
                            <input class="form-control" type="number" name="min_subjects_required" id="min_subjects_required" value="{{ old('min_subjects_required', $electiveGroup->min_subjects_required) }}" step="1">
                            @if($errors->has('min_subjects_required'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('min_subjects_required') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.electiveGroup.fields.min_subjects_required_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection