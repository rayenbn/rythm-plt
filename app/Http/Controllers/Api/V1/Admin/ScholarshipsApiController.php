<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScholarshipRequest;
use App\Http\Requests\UpdateScholarshipRequest;
use App\Http\Resources\Admin\ScholarshipResource;
use App\Models\Degree;
use App\Models\Scholarship;
use App\Models\University;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ScholarshipsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ScholarshipResource(Scholarship::with(['university', 'degree'])->advancedFilter());
    }

    public function store(StoreScholarshipRequest $request)
    {
        $scholarship = Scholarship::create($request->validated());
        // $scholarship->levels()->sync($request->input('levels.*.id', []));

        if ($media = $request->input('logo', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $scholarship->id]);
        }

        return (new ScholarshipResource($scholarship))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Scholarship $scholarship)
    {
        abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'university'       => University::get(['id', 'name']),
                'degree' => Degree::get(['id', 'name']),
            ],
        ]);
    }

    public function show(Scholarship $scholarship)
    {
        abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ScholarshipResource($scholarship->load(['university', 'degree']));
    }

    public function update(UpdateScholarshipRequest $request, Scholarship $scholarship)
    {
        $scholarship->update($request->validated());
        // $scholarship->levels()->sync($request->input('levels.*.id', []));
        // $scholarship->updateMedia($request->input('logo', []), 'company_logo');

        return (new ScholarshipResource($scholarship))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Scholarship $scholarship)
    {
        abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ScholarshipResource($scholarship->load(['university', 'degree'])),
            'meta' => [
                'university'   => University::get(['id', 'name']),
                'degree'       => Degree::get(['id', 'name']),
            ],
        ]);
    }

    public function destroy(Scholarship $scholarship)
    {
        abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $scholarship->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // public function storeMedia(Request $request)
    // {
    //     abort_if(Gate::none(['company_create', 'company_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     if ($request->has('size')) {
    //         $this->validate($request, [
    //             'file' => 'max:' . $request->input('size') * 1024,
    //         ]);
    //     }

    //     $model         = new Scholarship();
    //     $model->id     = $request->input('model_id', 0);
    //     $model->exists = true;
    //     $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

    //     return response()->json($media, Response::HTTP_CREATED);
    // }
}
