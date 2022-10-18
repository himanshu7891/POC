<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Request;

class UpdateApplicationRequest extends FormRequest
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
        if(Request::get('formSlug') == "personal-details") {
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
        } elseif(Request::get('formSlug') == "loan-details") {
            $rules = [
                "loan_type" => 'required',
                "autoloan_type" => 'required_if:loan_type,==,auto_loan',
                "homeloan_type" => 'required_if:loan_type,==,home_loan',
            ]; 
        } elseif(Request::get('formSlug') == "vehicle-details") {
            $rules = [
                'make' => 'required',
                'vehicle_type' => 'required',
                'model' => 'required',
                'variant' => 'required',
                'year_of_manufacturing' => 'required',
                'valuation' => 'required|numeric',
                'finance_amount' => 'required|numeric',
                'margin' => 'required|numeric',
                'funding' => 'required|numeric',
                // 'scheme_applied' => 'required',
                'months' => 'required',
                'emi_amount' => 'required|numeric',
                // 'customer_irr' => 'required',

                'registration_no' => 'required',
                'engine_no' => 'required',
                'chasis_no' => 'required',
                'insurance_company_name' => 'required',
                'idv' => 'required',
                'policy_no' => 'required',
                'insurance_policy_start_date' => 'required',
            ];
        } elseif(Request::get('formSlug') == "disbursement11-details") {
            $rules = [
                'bank_name' => 'required',
                'vehicle_no' => 'required',
                'customer_mobile' => 'required',
                'customer_confirmation' => 'required',
                'vehicle_type' => 'required',
                'make' => 'required',
                'model' => 'required',
                'variant' => 'required',
                'year_of_manufacturing' => 'required',
                'loan_amount' => 'required',
                'loan_variation_amount' => 'required',
                'emi_month' => 'required',
                'emi_amount' => 'required',
                'emi_starting_date' => 'required',
                'sms_send_option' => 'required',
                'processing_fee' => 'required',
                'stamp_duty' => 'required',
                'document_charge' => 'required',
                'pdd_charge' => 'required',
                'other_charge' => 'required',
                'valuation' => 'required',
                'insurance' => 'required',
                'insurance_amount' => 'required',
                'insurance_funding' => 'required',
                'payment_receivable' => 'required',
                'rto_tax' => 'required',
                'rto_charges' => 'required',
                'rto_paper_status' => 'required',
                'net_payment' => 'required',
                'payment_favour' => 'required',
                'commision_to' => 'required',
                'gst' => 'required',
            ];  
        } else {
            $rules = [];
        }
        
        
        return $rules;
    }

    public function messages()
    {
        if(Request::get('formSlug') == "personal-details") {
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
        } elseif(Request::get('formSlug') == "loan-details") {
            $msgs = [
                "loan_type.required" => 'Loan Type is required.',
                "autoloan_type.required_if" => 'Auto Loan is required.',
                "homeloan_type.required_if" => 'Home Loan is required.',
            ];
        } elseif(Request::get('formSlug') == "vehicle-details") {
            $msgs = [
                'make.required' => 'Make is required.',
                'vehicle_type.required' => 'Veicle Type is required.',
                'model.required' => 'Model is required.',
                'variant.required' => 'Variant is required.',
                'year_of_manufacturing.required' => 'Year of Manufacturing is required.',
                'valuation.required' => 'Valuation/Quotation is required.',
                'valuation.numeric' => 'Valuation/Quotation must be a number.',
                'finance_amount.required' => 'Finance Amount is required.',
                'finance_amount.numeric' => 'Finance Amount must be a number.',
                'margin.required' => 'Margin is required.',
                'margin.numeric' => 'Margin must be a number.',
                'funding.required' => 'Funding in % is required.',
                'funding.numeric' => 'Funding in % must be a number.',
                // 'scheme_applied.required' => 'Scheme Applied is required.',
                'months.required' => 'Months is required.',
                'emi_amount.required' => 'EMI Amount is required.',
                'emi_amount.numeric' => 'EMI Amount must be a number.',
                // 'customer_irr.required' => 'Customer IRR is required.',

                'registration_no.required' => 'Registration No. is required.',
                'engine_no.required' => 'Engine No. is required.',
                'chasis_no.required' => 'Chasis No. is required.',
                'insurance_company_name.required' => 'Insurance Company Name is required.',
                'idv.required' => 'IDV is required.',
                'policy_no.required' => 'Cover Note/Policy No. is required.',
                'insurance_policy_start_date.required' => 'Insurance Policy Start Date is required.',
            ];
        } elseif(Request::get('formSlug') == "disbursement11-details") {
            $msgs = [
                'bank_name.required' => 'Bank Name is required.',
                'vehicle_no.required' => 'Vehicle No. is required.',
                'customer_mobile.required' => 'Customer Mobile No. is required.',
                'customer_confirmation.required' => 'Customer Confirmation is required.',
                'vehicle_type.required' => 'Vehicle Type is required.',
                'make.required' => 'Make is required.',
                'model.required' => 'Model is required.',
                'variant.required' => 'Variant is required.',
                'year_of_manufacturing.required' => 'Year of Manufacturing is required.',
                'loan_amount.required' => 'Loan Amount is required.',
                'loan_variation_amount.required' => 'Loan Variation Amount is required.',
                'emi_month.required' => 'EMI Months is required.',
                'emi_amount.required' => 'EMI Amount is required.',
                'emi_starting_date.required' => 'Emi Starting Date is required.',
                'sms_send_option.required' => 'SMS Send Option is required.',
                'processing_fee.required' => 'Processing Fee is required.',
                'stamp_duty.required' => 'Stamp Duty is required.',
                'document_charge.required' => 'Document Charge is required.',
                'pdd_charge.required' => 'PDD Charge is required.',
                'other_charge.required' => 'Other Charge is required.',
                'valuation.required' => 'Valuation is required.',
                'insurance.required' => 'Loan Suraksha (Insurance) is required.',
                'insurance_amount.required' => 'Loan Suraksha Amount is required.',
                'insurance_funding.required' => 'M | Funding (Insurance) is required.',
                'payment_receivable.required' => 'Payment Receivable Form Bank is required.',
                'rto_tax.required' => 'RTO Tax is required.',
                'rto_charges.required' => 'RTO Charges is required.',
                'rto_paper_status.required' => 'RTO Paper Status is required.',
                'net_payment.required' => 'Net Payment is required.',
                'payment_favour.required' => 'Payment Favour Of is required.',
                'commision_to.required' => 'Commision To is required.',
                'gst.required' => 'With GST/Without GST is required.',
            ];
        } else {
            $msgs = [];
        }
            

        return $msgs;
    }
}
