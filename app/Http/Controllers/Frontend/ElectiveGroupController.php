<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyElectiveGroupRequest;
use App\Http\Requests\StoreElectiveGroupRequest;
use App\Http\Requests\UpdateElectiveGroupRequest;
use App\Models\ElectiveGroup;
use App\Models\Program;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ElectiveGroupController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('elective_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $electiveGroups = ElectiveGroup::with(['programs'])->get();

        $programs = Program::get();

        return view('frontend.electiveGroups.index', compact('electiveGroups', 'programs'));
    }

    public function create()
    {
        abort_if(Gate::denies('elective_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id');

        return view('frontend.electiveGroups.create', compact('programs'));
    }

    public function store(StoreElectiveGroupRequest $request)
    {
        $electiveGroup = ElectiveGroup::create($request->all());
        $electiveGroup->programs()->sync($request->input('programs', []));

        return redirect()->route('frontend.elective-groups.index');
    }

    public function edit(ElectiveGroup $electiveGroup)
    {
        abort_if(Gate::denies('elective_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id');

        $electiveGroup->load('programs');

        return view('frontend.electiveGroups.edit', compact('programs', 'electiveGroup'));
    }

    public function update(UpdateElectiveGroupRequest $request, ElectiveGroup $electiveGroup)
    {
        $electiveGroup->update($request->all());
        $electiveGroup->programs()->sync($request->input('programs', []));

        return redirect()->route('frontend.elective-groups.index');
    }

    public function show(ElectiveGroup $electiveGroup)
    {
        abort_if(Gate::denies('elective_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $electiveGroup->load('programs', 'electiveGroupSubjects');

        return view('frontend.electiveGroups.show', compact('electiveGroup'));
    }

    public function destroy(ElectiveGroup $electiveGroup)
    {
        abort_if(Gate::denies('elective_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $electiveGroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyElectiveGroupRequest $request)
    {
        ElectiveGroup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
