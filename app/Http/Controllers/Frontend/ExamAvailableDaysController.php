<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyExamAvailableDayRequest;
use App\Http\Requests\StoreExamAvailableDayRequest;
use App\Http\Requests\UpdateExamAvailableDayRequest;
use App\Models\ExamAvailableDay;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExamAvailableDaysController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('exam_available_day_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examAvailableDays = ExamAvailableDay::all();

        return view('frontend.examAvailableDays.index', compact('examAvailableDays'));
    }

    public function create()
    {
        abort_if(Gate::denies('exam_available_day_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.examAvailableDays.create');
    }

    public function store(StoreExamAvailableDayRequest $request)
    {
        $examAvailableDay = ExamAvailableDay::create($request->all());

        return redirect()->route('frontend.exam-available-days.index');
    }

    public function edit(ExamAvailableDay $examAvailableDay)
    {
        abort_if(Gate::denies('exam_available_day_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.examAvailableDays.edit', compact('examAvailableDay'));
    }

    public function update(UpdateExamAvailableDayRequest $request, ExamAvailableDay $examAvailableDay)
    {
        $examAvailableDay->update($request->all());

        return redirect()->route('frontend.exam-available-days.index');
    }

    public function show(ExamAvailableDay $examAvailableDay)
    {
        abort_if(Gate::denies('exam_available_day_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examAvailableDay->load('examAvailableDaysTimeTables');

        return view('frontend.examAvailableDays.show', compact('examAvailableDay'));
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
