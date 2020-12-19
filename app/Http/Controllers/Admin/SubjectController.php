<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('subject_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Subject::with(['programs', 'elective_groups'])->select(sprintf('%s.*', (new Subject)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'subject_show';
                $editGate      = 'subject_edit';
                $deleteGate    = 'subject_delete';
                $crudRoutePart = 'subjects';

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
            $table->editColumn('program', function ($row) {
                $labels = [];

                foreach ($row->programs as $program) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $program->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('semester', function ($row) {
                return $row->semester ? $row->semester : "";
            });
            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : "";
            });
            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category : "";
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : "";
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Subject::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('credits', function ($row) {
                return $row->credits ? $row->credits : "";
            });
            $table->editColumn('classroom_hours', function ($row) {
                return $row->classroom_hours ? $row->classroom_hours : "";
            });
            $table->editColumn('tutorial_hours', function ($row) {
                return $row->tutorial_hours ? $row->tutorial_hours : "";
            });
            $table->editColumn('lab_hours', function ($row) {
                return $row->lab_hours ? $row->lab_hours : "";
            });
            $table->editColumn('theory_exam_hours', function ($row) {
                return $row->theory_exam_hours ? $row->theory_exam_hours : "";
            });
            $table->editColumn('practical_exam_hours', function ($row) {
                return $row->practical_exam_hours ? $row->practical_exam_hours : "";
            });
            $table->editColumn('theory_intl_marks', function ($row) {
                return $row->theory_intl_marks ? $row->theory_intl_marks : "";
            });
            $table->editColumn('theory_intl_passing_marks', function ($row) {
                return $row->theory_intl_passing_marks ? $row->theory_intl_passing_marks : "";
            });
            $table->editColumn('theory_ext_marks', function ($row) {
                return $row->theory_ext_marks ? $row->theory_ext_marks : "";
            });
            $table->editColumn('theory_ext_passing_marks', function ($row) {
                return $row->theory_ext_passing_marks ? $row->theory_ext_passing_marks : "";
            });
            $table->editColumn('practical_intl_marks', function ($row) {
                return $row->practical_intl_marks ? $row->practical_intl_marks : "";
            });
            $table->editColumn('practical_intl_passing_marks', function ($row) {
                return $row->practical_intl_passing_marks ? $row->practical_intl_passing_marks : "";
            });
            $table->editColumn('practical_ext_marks', function ($row) {
                return $row->practical_ext_marks ? $row->practical_ext_marks : "";
            });
            $table->editColumn('practical_ext_passing_marks', function ($row) {
                return $row->practical_ext_passing_marks ? $row->practical_ext_passing_marks : "";
            });
            $table->editColumn('total_marks', function ($row) {
                return $row->total_marks ? $row->total_marks : "";
            });
            $table->editColumn('total_passing_marks', function ($row) {
                return $row->total_passing_marks ? $row->total_passing_marks : "";
            });
            $table->editColumn('elective', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->elective ? 'checked' : null) . '>';
            });
            $table->editColumn('elective_group', function ($row) {
                $labels = [];

                foreach ($row->elective_groups as $elective_group) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $elective_group->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'program', 'elective', 'elective_group']);

            return $table->make(true);
        }

        $programs        = Program::get();
        $elective_groups = ElectiveGroup::get();

        return view('admin.subjects.index', compact('programs', 'elective_groups'));
    }

    public function create()
    {
        abort_if(Gate::denies('subject_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id');

        $elective_groups = ElectiveGroup::all()->pluck('name', 'id');

        return view('admin.subjects.create', compact('programs', 'elective_groups'));
    }

    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->all());
        $subject->programs()->sync($request->input('programs', []));
        $subject->elective_groups()->sync($request->input('elective_groups', []));

        return redirect()->route('admin.subjects.index');
    }

    public function edit(Subject $subject)
    {
        abort_if(Gate::denies('subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::all()->pluck('title', 'id');

        $elective_groups = ElectiveGroup::all()->pluck('name', 'id');

        $subject->load('programs', 'elective_groups');

        return view('admin.subjects.edit', compact('programs', 'elective_groups', 'subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());
        $subject->programs()->sync($request->input('programs', []));
        $subject->elective_groups()->sync($request->input('elective_groups', []));

        return redirect()->route('admin.subjects.index');
    }

    public function show(Subject $subject)
    {
        abort_if(Gate::denies('subject_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject->load('programs', 'elective_groups');

        return view('admin.subjects.show', compact('subject'));
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
