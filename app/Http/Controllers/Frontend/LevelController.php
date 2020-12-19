<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLevelRequest;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Models\Level;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LevelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = Level::all();

        return view('frontend.levels.index', compact('levels'));
    }

    public function create()
    {
        abort_if(Gate::denies('level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.levels.create');
    }

    public function store(StoreLevelRequest $request)
    {
        $level = Level::create($request->all());

        return redirect()->route('frontend.levels.index');
    }

    public function edit(Level $level)
    {
        abort_if(Gate::denies('level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.levels.edit', compact('level'));
    }

    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update($request->all());

        return redirect()->route('frontend.levels.index');
    }

    public function show(Level $level)
    {
        abort_if(Gate::denies('level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $level->load('levelPrograms');

        return view('frontend.levels.show', compact('level'));
    }

    public function destroy(Level $level)
    {
        abort_if(Gate::denies('level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $level->delete();

        return back();
    }

    public function massDestroy(MassDestroyLevelRequest $request)
    {
        Level::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
