<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCollegeRequest;
use App\Http\Requests\StoreCollegeRequest;
use App\Http\Requests\UpdateCollegeRequest;
use App\Models\College;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CollegeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('college_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $colleges = College::all();

        return view('frontend.colleges.index', compact('colleges'));
    }

    public function create()
    {
        abort_if(Gate::denies('college_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.colleges.create');
    }

    public function store(StoreCollegeRequest $request)
    {
        $college = College::create($request->all());

        return redirect()->route('frontend.colleges.index');
    }

    public function edit(College $college)
    {
        abort_if(Gate::denies('college_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.colleges.edit', compact('college'));
    }

    public function update(UpdateCollegeRequest $request, College $college)
    {
        $college->update($request->all());

        return redirect()->route('frontend.colleges.index');
    }

    public function show(College $college)
    {
        abort_if(Gate::denies('college_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $college->load('collegePrograms');

        return view('frontend.colleges.show', compact('college'));
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
