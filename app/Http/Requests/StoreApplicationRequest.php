<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApplicationRequest extends FormRequest
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
            'system_date' => 'required',
            'user_id' => 'required',
            'team_id' => 'required',
            'branch_id' => 'required',
            'source_type' => 'required',
            'source_name' => 'required',
            'source_email' => 'required|email',
            'source_gst_no' => 'required',
            'source_contact' => 'required',
            'b_bank_type' => 'required',
            'b_profile_type' => 'required',
            'b_other_dd_type' => 'required_if:b_profile_type,==,self_employed',
            'b_company_name' => 'required',
            'b_company_type' => 'required',
        ];
        
        return $rules;
    }

    public function messages()
    {
        $msgs = [
            'system_date.required' => 'Date is required.',
            'user_id.required' => 'User Code is required.',
            'team_id.required' => 'Team Code is required.',
            'branch_id.required' => 'Branch Code is required.',
            'source_type.required' => 'Source Type is required.',
            'source_name.required' => 'Name is required.',
            'source_email.required' => 'Email is required.',
            'source_email.email' =>'Please enter a valid email address.',
            'source_gst_no.required' => 'GST No. is required.',
            'source_contact.required' => 'Contact No. is required.',
            'b_bank_type.required' => 'Finance/Bank Type is required.',
            'b_profile_type.required' => 'Profile Type is required.',
            'b_other_dd_type.required_if' => 'Other DD is required.',
            'b_company_name.required' => 'Company Name is required.',
            'b_company_type.required' => 'Company Type is required.',
        ];

        return $msgs;
    }
}
