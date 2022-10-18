<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicationLDRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function rules()
    // {
    //     return [
    //         //
    //     ];
    // }

    public function rules()
    {
        $rules = [
            "loan_type" => 'required',
            "autoloan_type" => 'required_if:loan_type,==,auto_loan',
            "homeloan_type" => 'required_if:loan_type,==,home_loan',
        ];
        
        return $rules;
    }

    public function messages()
    {
        $msgs = [
            "loan_type.required" => 'Loan Type is required.',
            "autoloan_type.required_if" => 'Auto Loan is required.',
            "homeloan_type.required_if" => 'Home Loan is required.',
        ];

        return $msgs;
    }
}
