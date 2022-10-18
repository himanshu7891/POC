<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicationVDRequest extends FormRequest
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
        
        return $rules;
    }

    public function messages()
    {
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

        return $msgs;
    }
}
