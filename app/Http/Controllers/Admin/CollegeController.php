<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCollegeRequest;
use App\Http\Requests\StoreCollegeRequest;
use App\Http\Requests\UpdateCollegeRequest;
use App\Models\College;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CollegeController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('college_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = College::query()->select(sprintf('%s.*', (new College)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'college_show';
                $editGate      = 'college_edit';
                $deleteGate    = 'college_delete';
                $crudRoutePart = 'colleges';

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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.colleges.index');
    }

    public function create()
    {
        abort_if(Gate::denies('college_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.colleges.create');
    }

    public function store(StoreCollegeRequest $request)
    {
        $college = College::create($request->all());

        return redirect()->route('admin.colleges.index');
    }

    public function edit(College $college)
    {
        abort_if(Gate::denies('college_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.colleges.edit', compact('college'));
    }

    public function update(UpdateCollegeRequest $request, College $college)
    {
        $college->update($request->all());

        return redirect()->route('admin.colleges.index');
    }

    public function show(College $college)
    {
        abort_if(Gate::denies('college_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $college->load('collegePrograms');

        return view('admin.colleges.show', compact('college'));
    }

    public function destroy(College $college)
    {
        abort_if(Gate::denies('college_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $college->delete();

        return back();
    }

    public function massDestroy(MassDestroyCollegeRequest $request)
    {
        College::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
