<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Http\Resources\Admin\LevelResource;
use App\Models\Level;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LevelsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LevelResource(Level::advancedFilter());
    }

    public function store(StoreLevelRequest $request)
    {
        $level = Level::create($request->validated());

        return (new LevelResource($level))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Level $level)
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Level $level)
    {
        abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LevelResource($level);
    }

    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update($request->validated());

        return (new LevelResource($level))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Level $level)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new LevelResource($level),
            'meta' => [],
        ]);
    }

    public function destroy(Level $level)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $level->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
