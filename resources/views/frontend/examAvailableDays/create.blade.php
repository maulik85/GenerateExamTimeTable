@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.examAvailableDay.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.exam-available-days.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.examAvailableDay.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="exam_start_date">{{ trans('cruds.examAvailableDay.fields.exam_start_date') }}</label>
                            <input class="form-control date" type="text" name="exam_start_date" id="exam_start_date" value="{{ old('exam_start_date') }}" required>
                            @if($errors->has('exam_start_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('exam_start_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.exam_start_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_1">{{ trans('cruds.examAvailableDay.fields.day_1') }}</label>
                            <input class="form-control date" type="text" name="day_1" id="day_1" value="{{ old('day_1') }}">
                            @if($errors->has('day_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_2">{{ trans('cruds.examAvailableDay.fields.day_2') }}</label>
                            <input class="form-control date" type="text" name="day_2" id="day_2" value="{{ old('day_2') }}">
                            @if($errors->has('day_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_3">{{ trans('cruds.examAvailableDay.fields.day_3') }}</label>
                            <input class="form-control date" type="text" name="day_3" id="day_3" value="{{ old('day_3') }}">
                            @if($errors->has('day_3'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_3') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_3_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_4">{{ trans('cruds.examAvailableDay.fields.day_4') }}</label>
                            <input class="form-control date" type="text" name="day_4" id="day_4" value="{{ old('day_4') }}">
                            @if($errors->has('day_4'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_4') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_4_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_5">{{ trans('cruds.examAvailableDay.fields.day_5') }}</label>
                            <input class="form-control date" type="text" name="day_5" id="day_5" value="{{ old('day_5') }}">
                            @if($errors->has('day_5'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_5') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_5_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_6">{{ trans('cruds.examAvailableDay.fields.day_6') }}</label>
                            <input class="form-control date" type="text" name="day_6" id="day_6" value="{{ old('day_6') }}">
                            @if($errors->has('day_6'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_6') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_6_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_7">{{ trans('cruds.examAvailableDay.fields.day_7') }}</label>
                            <input class="form-control date" type="text" name="day_7" id="day_7" value="{{ old('day_7') }}">
                            @if($errors->has('day_7'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_7') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_7_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_8">{{ trans('cruds.examAvailableDay.fields.day_8') }}</label>
                            <input class="form-control date" type="text" name="day_8" id="day_8" value="{{ old('day_8') }}">
                            @if($errors->has('day_8'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_8') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_8_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_9">{{ trans('cruds.examAvailableDay.fields.day_9') }}</label>
                            <input class="form-control date" type="text" name="day_9" id="day_9" value="{{ old('day_9') }}">
                            @if($errors->has('day_9'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_9') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_9_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_10">{{ trans('cruds.examAvailableDay.fields.day_10') }}</label>
                            <input class="form-control date" type="text" name="day_10" id="day_10" value="{{ old('day_10') }}">
                            @if($errors->has('day_10'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_10') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_10_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_11">{{ trans('cruds.examAvailableDay.fields.day_11') }}</label>
                            <input class="form-control date" type="text" name="day_11" id="day_11" value="{{ old('day_11') }}">
                            @if($errors->has('day_11'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_11') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_11_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_12">{{ trans('cruds.examAvailableDay.fields.day_12') }}</label>
                            <input class="form-control date" type="text" name="day_12" id="day_12" value="{{ old('day_12') }}">
                            @if($errors->has('day_12'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_12') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_12_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_13">{{ trans('cruds.examAvailableDay.fields.day_13') }}</label>
                            <input class="form-control date" type="text" name="day_13" id="day_13" value="{{ old('day_13') }}">
                            @if($errors->has('day_13'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_13') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_13_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_14">{{ trans('cruds.examAvailableDay.fields.day_14') }}</label>
                            <input class="form-control date" type="text" name="day_14" id="day_14" value="{{ old('day_14') }}">
                            @if($errors->has('day_14'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_14') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_14_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="day_15">{{ trans('cruds.examAvailableDay.fields.day_15') }}</label>
                            <input class="form-control date" type="text" name="day_15" id="day_15" value="{{ old('day_15') }}">
                            @if($errors->has('day_15'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day_15') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examAvailableDay.fields.day_15_helper') }}</span>
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