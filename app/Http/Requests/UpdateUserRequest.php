<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    // public function rules()
    // {
    //     return [
    //         'name' => [
    //             'string',
    //             'required',
    //         ],
    //         'email' => [
    //             'required',
    //             'unique:users,email,' . request()->route('user')->id,
    //         ],
    //         'roles.*' => [
    //             'integer',
    //         ],
    //         'roles' => [
    //             'required',
    //             'array',
    //         ],
    //     ];
    // }

    public function rules()
    {
        $rules = [
            'team_id' => 'required',
            'branch_id' => 'required',
            'name' => 'string|required',
            'email' => 'required|unique:users,email,'.request()->route('user')->id.',id',
            'password' => 'required',
            'roles.*' => 'integer',
            'roles' => 'required|array',
        ];
        
        return $rules;
    }

    public function messages()
    {
        $msgs = [
            'team_id.required' => 'Team is required.',
            'branch_id.required' => 'Branch is required.',
        ];

        return $msgs;
    }
}
