<?php

namespace App\Http\Requests;

use App\Models\University;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUniversityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('city_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'location' => [
                'string',
                'required',
            ],
            'logo'            => [
                'array',
                'nullable',
            ],
            'logo.*.id'       => [
                'integer',
                'exists:media,id',
            ],
            'bg_image'            => [
                'array',
                'nullable',
            ],
            'bg_image.*.id'       => [
                'integer',
                'exists:media,id',
            ],
            'desc'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
