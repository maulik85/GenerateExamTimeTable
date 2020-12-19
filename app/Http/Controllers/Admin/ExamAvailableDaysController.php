<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyExamAvailableDayRequest;
use App\Http\Requests\StoreExamAvailableDayRequest;
use App\Http\Requests\UpdateExamAvailableDayRequest;
use App\Models\ExamAvailableDay;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ExamAvailableDaysController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('exam_available_day_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ExamAvailableDay::query()->select(sprintf('%s.*', (new ExamAvailableDay)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'exam_available_day_show';
                $editGate      = 'exam_available_day_edit';
                $deleteGate    = 'exam_available_day_delete';
                $crudRoutePart = 'exam-available-days';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.examAvailableDays.index');
    }

    public function create()
    {
        abort_if(Gate::denies('exam_available_day_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examAvailableDays.create');
    }

    public function store(StoreExamAvailableDayRequest $request)
    {
        $examAvailableDay = ExamAvailableDay::create($request->all());

        return redirect()->route('admin.exam-available-days.index');
    }

    public function edit(ExamAvailableDay $examAvailableDay)
    {
        abort_if(Gate::denies('exam_available_day_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examAvailableDays.edit', compact('examAvailableDay'));
    }

    public function update(UpdateExamAvailableDayRequest $request, ExamAvailableDay $examAvailableDay)
    {
        $examAvailableDay->update($request->all());

        return redirect()->route('admin.exam-available-days.index');
    }

    public function show(ExamAvailableDay $examAvailableDay)
    {
        abort_if(Gate::denies('exam_available_day_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examAvailableDay->load('examAvailableDaysTimeTables');

        return view('admin.examAvailableDays.show', compact('examAvailableDay'));
    }

    public function destroy(ExamAvailableDay $examAvailableDay)
    {
        abort_if(Gate::denies('exam_available_day_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examAvailableDay->delete();

        return back();
    }

    public function massDestroy(MassDestroyExamAvailableDayRequest $request)
    {
        ExamAvailableDay::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
