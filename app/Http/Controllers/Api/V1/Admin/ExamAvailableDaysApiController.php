<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamAvailableDayRequest;
use App\Http\Requests\UpdateExamAvailableDayRequest;
use App\Http\Resources\Admin\ExamAvailableDayResource;
use App\Models\ExamAvailableDay;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExamAvailableDaysApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exam_available_day_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExamAvailableDayResource(ExamAvailableDay::all());
    }

    public function store(StoreExamAvailableDayRequest $request)
    {
        $examAvailableDay = ExamAvailableDay::create($request->all());

        return (new ExamAvailableDayResource($examAvailableDay))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExamAvailableDay $examAvailableDay)
    {
        abort_if(Gate::denies('exam_available_day_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExamAvailableDayResource($examAvailableDay);
    }

    public function update(UpdateExamAvailableDayRequest $request, ExamAvailableDay $examAvailableDay)
    {
        $examAvailableDay->update($request->all());

        return (new ExamAvailableDayResource($examAvailableDay))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExamAvailableDay $examAvailableDay)
    {
        abort_if(Gate::denies('exam_available_day_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examAvailableDay->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
