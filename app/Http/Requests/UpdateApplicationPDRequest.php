<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicationPDRequest extends FormRequest
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
            "applicant_name" => 'required',
            "applicant_designation_type" => 'required',
            "applicant_contact_person" => 'required',
            "applicant_contact" => 'required',
            // "applciant_other_contact" => 'required',
            "applicant_email" => 'required|email',
            // "applicant_dob" => 'required',
            "resident_type" => "required",
            "rc_address" => 'required',
            "rc_area" => 'required',
            "rc_city" => 'required',
            "rc_state" => 'required',
            "rp_address" => 'required',
            "rp_area" => 'required',
            "rp_city" => 'required',
            "rp_state" => 'required',
            "o_company_name" => 'required',
            "o_address" => 'required',
            "o_area" => 'required',
            "o_city" => 'required',
            "o_state" => 'required',
            // "o_landmark" => 'required',
            "o_pincode" => 'required',
        ];
        
        return $rules;
    }

    public function messages()
    {
        $msgs = [
            "applicant_name.required" => 'Main Applicant is required.',
            "applicant_designation_type.required" => 'Designation Type is required.',
            "applicant_contact_person.required" => 'Contact Person is required.',
            "applicant_contact.required" => 'Contact No. is required.',
            // "applciant_other_contact.required" => 'Other Contact No. is required.',
            "applicant_email.required" => 'Email Id is requried.',
            "applicant_email.email" => 'Please enter a valid email address.',
            // "applicant_dob.required" => 'DOB is required.',
            "resident_type.required" => "Resident Type is required",
            "rc_address.required" => 'Address is required.',
            "rc_area.required" => 'Area is required.',
            "rc_city.required" => 'City is required.',
            "rc_state.required" => 'State is required.',
            "rp_address.required" => 'Address is required.',
            "rp_area.required" => 'Area is required.',
            "rp_city.required" => 'City is required.',
            "rp_state.required" => 'State is required.',
            "o_company_name.required" => 'Company Name is required.',
            "o_address.required" => 'Address is required.',
            "o_area.required" => 'Area is required.',
            "o_city.required" => 'City is required.',
            "o_state.required" => 'State is required.',
            // "o_landmark.required" => 'Landmark is required.',
            "o_pincode.required" => 'Pincode is required.',
        ];

        return $msgs;
    }
}
