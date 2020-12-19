<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySubjectRequest;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\ElectiveGroup;
use App\Models\Program;
use App\Models\Subject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubjectController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('subject_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Subject::with(['programs', 'elective_groups'])->get();

        $programs = Program::get();

        $elective_groups = ElectiveGroup::get();

        return view('frontend.subjects.index', compact('subjects', 'programs', 'elective_groups'));
    }

    public function create()
    {
        abort_if(Gate::denies('subject_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id');

        $elective_groups = ElectiveGroup::all()->pluck('name', 'id');

        return view('frontend.subjects.create', compact('programs', 'elective_groups'));
    }

    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->all());
        $subject->programs()->sync($request->input('programs', []));
        $subject->elective_groups()->sync($request->input('elective_groups', []));

        return redirect()->route('frontend.subjects.index');
    }

    public function edit(Subject $subject)
    {
        abort_if(Gate::denies('subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id');

        $elective_groups = ElectiveGroup::all()->pluck('name', 'id');

        $subject->load('programs', 'elective_groups');

        return view('frontend.subjects.edit', compact('programs', 'elective_groups', 'subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());
        $subject->programs()->sync($request->input('programs', []));
        $subject->elective_groups()->sync($request->input('elective_groups', []));

        return redirect()->route('frontend.subjects.index');
    }

    public function show(Subject $subject)
    {
        abort_if(Gate::denies('subject_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject->load('programs', 'elective_groups');

        return view('frontend.subjects.show', compact('subject'));
    }

    public function destroy(Subject $subject)
    {
        abort_if(Gate::denies('subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject->delete();

        return back();
    }

    public function massDestroy(MassDestroySubjectRequest $request)
    {
        Subject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
