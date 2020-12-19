<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimeTableRequest;
use App\Http\Requests\UpdateTimeTableRequest;
use App\Http\Resources\Admin\TimeTableResource;
use App\Models\TimeTable;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeTableApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('time_table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TimeTableResource(TimeTable::with(['program', 'exam_available_days', 'academic_year'])->get());
    }

    public function store(StoreTimeTableRequest $request)
    {
        $timeTable = TimeTable::create($request->all());

        return (new TimeTableResource($timeTable))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TimeTable $timeTable)
    {
        abort_if(Gate::denies('time_table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TimeTableResource($timeTable->load(['program', 'exam_available_days', 'academic_year']));
    }

    public function update(UpdateTimeTableRequest $request, TimeTable $timeTable)
    {
        $timeTable->update($request->all());

        return (new TimeTableResource($timeTable))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TimeTable $timeTable)
    {
        abort_if(Gate::denies('time_table_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeTable->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
