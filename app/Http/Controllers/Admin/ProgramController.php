<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProgramRequest;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\College;
use App\Models\Faculty;
use App\Models\Level;
use App\Models\Program;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('program_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Program::with(['faculty', 'colleges', 'level'])->select(sprintf('%s.*', (new Program)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'program_show';
                $editGate      = 'program_edit';
                $deleteGate    = 'program_delete';
                $crudRoutePart = 'programs';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : "";
            });
            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category : "";
            });
            $table->addColumn('faculty_name', function ($row) {
                return $row->faculty ? $row->faculty->name : '';
            });

            $table->editColumn('faculty.code', function ($row) {
                return $row->faculty ? (is_string($row->faculty) ? $row->faculty : $row->faculty->code) : '';
            });
            $table->editColumn('college', function ($row) {
                $labels = [];

                foreach ($row->colleges as $college) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $college->name);
                }

                return implode(' ', $labels);
            });
            $table->addColumn('level_name', function ($row) {
                return $row->level ? $row->level->name : '';
            });

            $table->editColumn('level.code', function ($row) {
                return $row->level ? (is_string($row->level) ? $row->level : $row->level->code) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'faculty', 'college', 'level']);

            return $table->make(true);
        }

        $faculties = Faculty::get();
        $colleges  = College::get();
        $levels    = Level::get();

        return view('admin.programs.index', compact('faculties', 'colleges', 'levels'));
    }

    public function create()
    {
        abort_if(Gate::denies('program_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colleges = College::all()->pluck('name', 'id');

        $levels = Level::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.programs.create', compact('faculties', 'colleges', 'levels'));
    }

    public function store(StoreProgramRequest $request)
    {
        $program = Program::create($request->all());
        $program->colleges()->sync($request->input('colleges', []));

        return redirect()->route('admin.programs.index');
    }

    public function edit(Program $program)
    {
        abort_if(Gate::denies('program_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colleges = College::all()->pluck('name', 'id');

        $levels = Level::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $program->load('faculty', 'colleges', 'level');

        return view('admin.programs.edit', compact('faculties', 'colleges', 'levels', 'program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->update($request->all());
        $program->colleges()->sync($request->input('colleges', []));

        return redirect()->route('admin.programs.index');
    }

    public function show(Program $program)
    {
        abort_if(Gate::denies('program_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $program->load('faculty', 'colleges', 'level', 'programTimeTables', 'programSubjects', 'programsElectiveGroups');

        return view('admin.programs.show', compact('program'));
    }

    public function destroy(Program $program)
    {
        abort_if(Gate::denies('program_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $program->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgramRequest $request)
    {
        Program::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
