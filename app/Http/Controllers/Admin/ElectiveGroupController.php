<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class ElectiveGroupController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('elective_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ElectiveGroup::with(['programs'])->select(sprintf('%s.*', (new ElectiveGroup)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'elective_group_show';
                $editGate      = 'elective_group_edit';
                $deleteGate    = 'elective_group_delete';
                $crudRoutePart = 'elective-groups';

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
            $table->editColumn('programs', function ($row) {
                $labels = [];

                foreach ($row->programs as $program) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $program->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('offered_subjects_in_group', function ($row) {
                return $row->offered_subjects_in_group ? $row->offered_subjects_in_group : "";
            });
            $table->editColumn('max_subjects_allowed', function ($row) {
                return $row->max_subjects_allowed ? $row->max_subjects_allowed : "";
            });
            $table->editColumn('min_subjects_required', function ($row) {
                return $row->min_subjects_required ? $row->min_subjects_required : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'programs']);

            return $table->make(true);
        }

        $programs = Program::get();

        return view('admin.electiveGroups.index', compact('programs'));
    }

    public function create()
    {
        abort_if(Gate::denies('elective_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id');

        return view('admin.electiveGroups.create', compact('programs'));
    }

    public function store(StoreElectiveGroupRequest $request)
    {
        $electiveGroup = ElectiveGroup::create($request->all());
        $electiveGroup->programs()->sync($request->input('programs', []));

        return redirect()->route('admin.elective-groups.index');
    }

    public function edit(ElectiveGroup $electiveGroup)
    {
        abort_if(Gate::denies('elective_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id');

        $electiveGroup->load('programs');

        return view('admin.electiveGroups.edit', compact('programs', 'electiveGroup'));
    }

    public function update(UpdateElectiveGroupRequest $request, ElectiveGroup $electiveGroup)
    {
        $electiveGroup->update($request->all());
        $electiveGroup->programs()->sync($request->input('programs', []));

        return redirect()->route('admin.elective-groups.index');
    }

    public function show(ElectiveGroup $electiveGroup)
    {
        abort_if(Gate::denies('elective_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $electiveGroup->load('programs', 'electiveGroupSubjects');

        return view('admin.electiveGroups.show', compact('electiveGroup'));
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
