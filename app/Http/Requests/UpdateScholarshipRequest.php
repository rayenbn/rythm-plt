<?php

namespace App\Http\Requests;

use App\Models\Scholarship;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateScholarshipRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_edit');
    }

    public function rules()
    {
        return [
            'scholar_type'      => [
                'string',
                'required',
            ],
            'scholar_duration'  => [
                'string',
                'required',
            ],
            'scholar_coverage'  => [
                'string',
                'required',
            ],
            'starting_date'     => [
                'string',
                'required',
            ],
            'teaching_lang'     => [
                'string',
                'required',
            ],
            'original_tuition'  => [
                'string',
                'required',
            ],
            'desc'              => [
                'string',
                'nullable',
            ],
            'university_id'     => [
                'integer',
                'exists:universities,id',
                'nullable',
            ],
            'levels'      => [
                'array',
            ],
            'levels.*.id' => [
                'integer',
                'exists:levels,id',
            ],
            // 'logo'            => [
            //     'array',
            //     'nullable',
            // ],
            // 'logo.*.id'       => [
            //     'integer',
            //     'exists:media,id',
            // ],
        ];
    }
}
