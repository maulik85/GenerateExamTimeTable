<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreElectiveGroupRequest;
use App\Http\Requests\UpdateElectiveGroupRequest;
use App\Http\Resources\Admin\ElectiveGroupResource;
use App\Models\ElectiveGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ElectiveGroupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('elective_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ElectiveGroupResource(ElectiveGroup::with(['programs'])->get());
    }

    public function store(StoreElectiveGroupRequest $request)
    {
        $electiveGroup = ElectiveGroup::create($request->all());
        $electiveGroup->programs()->sync($request->input('programs', []));

        return (new ElectiveGroupResource($electiveGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ElectiveGroup $electiveGroup)
    {
        abort_if(Gate::denies('elective_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ElectiveGroupResource($electiveGroup->load(['programs']));
    }

    public function update(UpdateElectiveGroupRequest $request, ElectiveGroup $electiveGroup)
    {
        $electiveGroup->update($request->all());
        $electiveGroup->programs()->sync($request->input('programs', []));

        return (new ElectiveGroupResource($electiveGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ElectiveGroup $electiveGroup)
    {
        abort_if(Gate::denies('elective_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $electiveGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
