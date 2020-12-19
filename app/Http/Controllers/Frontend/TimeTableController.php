<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTimeTableRequest;
use App\Http\Requests\StoreTimeTableRequest;
use App\Http\Requests\UpdateTimeTableRequest;
use App\Models\AcademicYear;
use App\Models\ExamAvailableDay;
use App\Models\Program;
use App\Models\TimeTable;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeTableController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('time_table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeTables = TimeTable::with(['program', 'exam_available_days', 'academic_year'])->get();

        $programs = Program::get();

        $exam_available_days = ExamAvailableDay::get();

        $academic_years = AcademicYear::get();

        return view('frontend.timeTables.index', compact('timeTables', 'programs', 'exam_available_days', 'academic_years'));
    }

    public function create()
    {
        abort_if(Gate::denies('time_table_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exam_available_days = ExamAvailableDay::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_years = AcademicYear::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.timeTables.create', compact('programs', 'exam_available_days', 'academic_years'));
    }

    public function store(StoreTimeTableRequest $request)
    {
        $timeTable = TimeTable::create($request->all());

        return redirect()->route('frontend.time-tables.index');
    }

    public function edit(TimeTable $timeTable)
    {
        abort_if(Gate::denies('time_table_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exam_available_days = ExamAvailableDay::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_years = AcademicYear::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $timeTable->load('program', 'exam_available_days', 'academic_year');

        return view('frontend.timeTables.edit', compact('programs', 'exam_available_days', 'academic_years', 'timeTable'));
    }

    public function update(UpdateTimeTableRequest $request, TimeTable $timeTable)
    {
        $timeTable->update($request->all());

        return redirect()->route('frontend.time-tables.index');
    }

    public function show(TimeTable $timeTable)
    {
        abort_if(Gate::denies('time_table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeTable->load('program', 'exam_available_days', 'academic_year');

        return view('frontend.timeTables.show', compact('timeTable'));
    }

    public function destroy(TimeTable $timeTable)
    {
        abort_if(Gate::denies('time_table_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeTable->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimeTableRequest $request)
    {
        TimeTable::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
