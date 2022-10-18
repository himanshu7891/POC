<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_edit');
    }

    public function rules()
    {
        $rules = [
            'name' => 'required',
        ];
        
        return $rules;
    }

    public function messages()
    {
        $msgs = [
            'name.required' => 'Name is required.',
        ];

        return $msgs;
    }
}
