<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class TimeTableController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('time_table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TimeTable::with(['program', 'exam_available_days', 'academic_year'])->select(sprintf('%s.*', (new TimeTable)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'time_table_show';
                $editGate      = 'time_table_edit';
                $deleteGate    = 'time_table_delete';
                $crudRoutePart = 'time-tables';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->addColumn('program_title', function ($row) {
                return $row->program ? $row->program->title : '';
            });

            $table->editColumn('program.code', function ($row) {
                return $row->program ? (is_string($row->program) ? $row->program : $row->program->code) : '';
            });
            $table->editColumn('program.category', function ($row) {
                return $row->program ? (is_string($row->program) ? $row->program : $row->program->category) : '';
            });
            $table->editColumn('semester', function ($row) {
                return $row->semester ? $row->semester : "";
            });
            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : "";
            });
            $table->addColumn('exam_available_days_name', function ($row) {
                return $row->exam_available_days ? $row->exam_available_days->name : '';
            });

            $table->editColumn('start_time', function ($row) {
                return $row->start_time ? $row->start_time : "";
            });
            $table->addColumn('academic_year_name', function ($row) {
                return $row->academic_year ? $row->academic_year->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'program', 'exam_available_days', 'academic_year']);

            return $table->make(true);
        }

        $programs            = Program::get();
        $exam_available_days = ExamAvailableDay::get();
        $academic_years      = AcademicYear::get();

        return view('admin.timeTables.index', compact('programs', 'exam_available_days', 'academic_years'));
    }

    public function create()
    {
        abort_if(Gate::denies('time_table_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exam_available_days = ExamAvailableDay::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_years = AcademicYear::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.timeTables.create', compact('programs', 'exam_available_days', 'academic_years'));
    }

    public function store(StoreTimeTableRequest $request)
    {
        $timeTable = TimeTable::create($request->all());

        return redirect()->route('admin.time-tables.index');
    }

    public function edit(TimeTable $timeTable)
    {
        abort_if(Gate::denies('time_table_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exam_available_days = ExamAvailableDay::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_years = AcademicYear::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $timeTable->load('program', 'exam_available_days', 'academic_year');

        return view('admin.timeTables.edit', compact('programs', 'exam_available_days', 'academic_years', 'timeTable'));
    }

    public function update(UpdateTimeTableRequest $request, TimeTable $timeTable)
    {
        $timeTable->update($request->all());

        return redirect()->route('admin.time-tables.index');
    }

    public function show(TimeTable $timeTable)
    {
        abort_if(Gate::denies('time_table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeTable->load('program', 'exam_available_days', 'academic_year');

        return view('admin.timeTables.show', compact('timeTable'));
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
