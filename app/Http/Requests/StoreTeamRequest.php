<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_create');
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
