<?php

namespace App\Http\Controllers\Frontend;

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

class ProgramController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('program_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::with(['faculty', 'colleges', 'level'])->get();

        $faculties = Faculty::get();

        $colleges = College::get();

        $levels = Level::get();

        return view('frontend.programs.index', compact('programs', 'faculties', 'colleges', 'levels'));
    }

    public function create()
    {
        abort_if(Gate::denies('program_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colleges = College::all()->pluck('name', 'id');

        $levels = Level::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.programs.create', compact('faculties', 'colleges', 'levels'));
    }

    public function store(StoreProgramRequest $request)
    {
        $program = Program::create($request->all());
        $program->colleges()->sync($request->input('colleges', []));

        return redirect()->route('frontend.programs.index');
    }

    public function edit(Program $program)
    {
        abort_if(Gate::denies('program_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colleges = College::all()->pluck('name', 'id');

        $levels = Level::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $program->load('faculty', 'colleges', 'level');

        return view('frontend.programs.edit', compact('faculties', 'colleges', 'levels', 'program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->update($request->all());
        $program->colleges()->sync($request->input('colleges', []));

        return redirect()->route('frontend.programs.index');
    }

    public function show(Program $program)
    {
        abort_if(Gate::denies('program_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $program->load('faculty', 'colleges', 'level', 'programTimeTables', 'programSubjects', 'programsElectiveGroups');

        return view('frontend.programs.show', compact('program'));
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
