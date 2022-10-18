<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBranchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('branch_create');
    }

    public function rules()
    {
        $rules = [
            'team_id' => 'required',
            'name' => 'required',
        ];
        
        return $rules;
    }

    public function messages()
    {
        $msgs = [
            'team_id.required' => 'Team is required.',
            'name.required' => 'Name is required.',
        ];

        return $msgs;
    }
}
