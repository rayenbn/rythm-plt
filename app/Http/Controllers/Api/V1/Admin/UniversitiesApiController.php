<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Http\Resources\Admin\UniversityResource;
use App\Models\University;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UniversitiesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('city_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UniversityResource(University::advancedFilter());
    }

    public function store(StoreUniversityRequest $request)
    {
        // dd($request->all());
        $university = University::create($request->validated());

        if ($media = $request->input('logo', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $university->id]);
        }

        if ($media = $request->input('bg_image', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $university->id]);
        }

        return (new UniversityResource($university))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(University $university)
    {
        abort_if(Gate::denies('city_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(University $university)
    {
        abort_if(Gate::denies('city_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UniversityResource($university);
    }

    public function update(UpdateUniversityRequest $request, University $university)
    {
        $university->update($request->validated());

        return (new UniversityResource($university))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(University $university)
    {
        abort_if(Gate::denies('city_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new UniversityResource($university),
            'meta' => [],
        ]);
    }

    public function destroy(University $university)
    {
        abort_if(Gate::denies('city_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $university->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['city_create', 'city_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new University();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
