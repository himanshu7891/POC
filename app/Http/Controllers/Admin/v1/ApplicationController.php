<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\FormSteps;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Requests\UpdateApplicationPDRequest;
use App\Http\Requests\UpdateApplicationLDRequest;
use App\Http\Requests\UpdateApplicationVDRequest;
use Gate;
use Admin;
use App\Models\Application;
use App\Models\References;
use App\Models\CoApplicantDetails;
use App\Models\Vehicles;
use App\Models\DisbursementDetail;
use App\Models\ApplicationFormStatus;
use App\Models\ApplicationStatus;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('application_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applications = Application::with(['user','team','branch','applicationStatus'])->get();
        
        return view('admin.v1.applications.index', compact('applications'));
    }

    public function changeApplicationStatus(Request $request) {
        
        $response = ApplicationStatus::where('application_id',$request['applicationId'])->update(['status'=>$request['status']]);
        if($response) {
            return response()->json(['success'=>'Status updated successfully.']);
        } else {
            return response()->json(['error'=> 'Something went wrong!']);
        }
    }

    public function create()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formSteps = FormSteps::where('status',1)->get();
        $user = \Auth::user();
        $user->load('userTeamBranch','userTeamBranch.user','userTeamBranch.team','userTeamBranch.branch');
        $applicationCode = 0;
        $formSlug = 'application';
        $applicationData  = "";

        return view('admin.v1.applications.create', compact('formSteps','user','applicationCode','formSlug'));
    }

    public function applicationStore(StoreApplicationRequest $request) {
        //application
        $ins['application_code'] = Admin::applicationCode($request->user_id,$request->team_id,$request->branch_id);
        $ins['system_date'] = $request->system_date ?? NULL;
        $ins['user_id'] = $request->user_id;
        $ins['team_id'] = $request->team_id;
        $ins['branch_id'] = $request->branch_id;

        //source
        $ins['source_type'] = $request->source_type ?? NULL;
        $ins['source_name'] = $request->source_name ?? NULL;
        $ins['source_email'] = $request->source_email ?? NULL;
        $ins['source_gst_no'] = $request->source_gst_no ?? NULL;
        $ins['source_contact'] = $request->source_contact ?? NULL;

        //business details
        $ins['b_bank_type'] = $request->b_bank_type ?? NULL;
        $ins['b_profile_type'] = $request->b_profile_type ?? NULL;
        $ins['b_other_dd_type'] = $request->b_other_dd_type ?? NULL;
        $ins['b_company_name'] = $request->b_company_name ?? NULL;
        $ins['b_company_type'] = $request->b_company_type ?? NULL;

        $applicationId = Application::insertGetId($ins);
        $application_code = Admin::getApplicationCode($applicationId);

        if($applicationId) {

            $formStatus['application_id'] = $applicationId;
            $formStatus['form_id'] = '1';
            ApplicationFormStatus::insertGetId($formStatus);

            $appStatus['application_id'] = $applicationId;
            $appStatus['status'] = "pending";
            ApplicationStatus::insertGetId($appStatus);

            $url = route('admin.application.edit',[$application_code,'personal-details']);
            return redirect($url)->with('alert-success','Application submitted successfully.');
        } else {
            return redirect()->back()->with('alert-error','Something Went Wrong!');
        }
        
    }

    public function applicationEdit(Request $request) {

        $formSteps = FormSteps::where('status',1)->get();
        $user = \Auth::user();
        $user->load('userTeamBranch','userTeamBranch.user','userTeamBranch.team','userTeamBranch.branch');

        $applicationCode = $request->applicationCode;
        $formSlug = $request->formSlug;
        $applicationData  = Application::where('application_code',$applicationCode)
                            ->with(['applicationStatus','references','coapplicants','vehicle'])
                            ->first();

        return view('admin.v1.applications.create', compact('formSteps','user','applicationData','applicationCode','formSlug'));
    } 

    public function applicationPDUpdate(UpdateApplicationRequest $request) {

        $formSlug = $request->formSlug;
        $application_code = $request->applicationCode;
        $application = Application::where('application_code',$application_code)->first();

        if($formSlug == 'personal-details') {
            //person details
            $update['applicant_name'] = $request->applicant_name ?? NULL;
            $update['applicant_designation_type'] = $request->applicant_designation_type ?? NULL;
            $update['applicant_contact_person'] = $request->applicant_contact_person ?? NULL;
            $update['applicant_contact'] = $request->applicant_contact ?? NULL;
            $update['applicant_other_contact'] = $request->applicant_other_contact ?? NULL;
            $update['applicant_email'] = $request->applicant_email ?? NULL;
            $update['applicant_dob'] = $request->applicant_dob ?? NULL;
            
            //resident details
            $update['resident_type'] = $request->resident_type ?? NULL;

            // current address
            $update['rc_address'] = $request->rc_address ?? NULL;
            $update['rc_area'] = $request->rc_area ?? NULL;
            $update['rc_city'] = $request->rc_city ?? NULL;
            $update['rc_state'] = $request->rc_state ?? NULL;

            //permanant address
            $update['rp_address'] = $request->rp_address ?? NULL;
            $update['rp_area'] = $request->rp_area ?? NULL;
            $update['rp_city'] = $request->rp_city ?? NULL;
            $update['rp_state'] = $request->rp_state ?? NULL;

            //office details
            $update['o_company_name'] = $request->o_company_name ?? NULL;
            $update['o_address'] = $request->o_address ?? NULL;
            $update['o_area'] = $request->o_area ?? NULL;
            $update['o_city'] = $request->o_city ?? NULL;
            $update['o_state'] = $request->o_state ?? NULL;
            $update['o_landmark'] = $request->o_landmark ?? NULL;
            $update['o_pincode'] = $request->o_pincode ?? NULL;

            $application_code = $request->applicationCode;
            $res = Application::where('application_code',$application_code)->update($update);
            
            if($res) {

                $form = FormSteps::where('slug',$formSlug)->first();

                $formStatus['application_id'] = $application->id;
                $formStatus['form_id'] = $form->id;
                ApplicationFormStatus::insertGetId($formStatus);

                $url = route('admin.application.edit',[$application_code,'loan-details']);
                return redirect($url)->with('alert-success','Personal Details submitted successfully.');
            } else {
                return redirect()->back()->with('alert-success','Something Went Wrong!');;
            }
        } elseif($formSlug == 'loan-details') {
            //loan-details
            $update['loan_type'] = $request->loan_type ?? NULL;
            $update['autoloan_type'] = $request->autoloan_type ?? NULL;
            $update['homeloan_type'] = $request->homeloan_type ?? NULL;
            
            $application_code = $request->applicationCode;
            $res = Application::where('application_code',$application_code)->update($update);
            
            if($res) {
                
                if(isset($request->ref_name) && !empty($request->ref_name)) {
                    $ref_name = $request->ref_name;
                    $ref_address = $request->ref_address;
                    $ref_mobile = $request->ref_mobile;
                    $ref_relationship = $request->ref_relationship;
                    
                    foreach($ref_name as $key => $row) {
                        
                        if(isset($row) && !empty($row)) {
                            $ref['application_id'] = $application->id;
                            $ref['name'] = $row ?? NULL;
                            $ref['address'] = $ref_address[$key] ?? NULL;
                            $ref['mobile'] = $ref_mobile[$key] ?? NULL;
                            $ref['relationship'] = $ref_relationship[$key] ?? NULL;
                            
                            References::insertGetId($ref);
                        }
                    }
                }

                if(isset($request->co_applicant) && !empty($request->co_applicant)) {
                    if(isset($request->co_applicant_name) && !empty($request->co_applicant_name)) {
                        $co_applicant_name = $request->co_applicant_name;
                        $co_applicant_address = $request->co_applicant_address;
                        $co_applicant_mobile = $request->co_applicant_mobile;
                        $co_applicant_relationship = $request->co_applicant_relationship;
                        $co_applicant_company_name = $request->co_applicant_company_name;
                        $co_applicant_company_address = $request->co_applicant_company_address;
                        $co_applicant_area = $request->co_applicant_area;
                        $co_applicant_city = $request->co_applicant_city;
                        $co_applicant_state = $request->co_applicant_state;
                        $co_applicant_landmark = $request->co_applicant_landmark;
                        $co_applicant_pincode = $request->co_applicant_pincode;

                        foreach($co_applicant_name as $key => $row) {
                            if(isset($row) && !empty($row)) {
                                $coapp['application_id'] = $application->id;
                                $coapp['name'] = $row ?? NULL;
                                $coapp['address'] = $co_applicant_address[$key] ?? NULL;
                                $coapp['mobile'] = $co_applicant_mobile[$key] ?? NULL;
                                $coapp['relationship'] = $co_applicant_relationship[$key] ?? NULL;
                                $coapp['company_name'] = $co_applicant_company_name[$key] ?? NULL;
                                $coapp['company_address'] = $co_applicant_company_address[$key] ?? NULL;
                                $coapp['area'] = $co_applicant_area[$key] ?? NULL;
                                $coapp['city'] = $co_applicant_city[$key] ?? NULL;
                                $coapp['state'] = $co_applicant_state[$key] ?? NULL;
                                $coapp['landmark'] = $co_applicant_landmark[$key] ?? NULL;
                                $coapp['pincode'] = $co_applicant_pincode[$key] ?? NULL;
                                CoApplicantDetails::insertGetId($coapp);
                            } 
                        }
                    }
                }
                  
                $form = FormSteps::where('slug',$formSlug)->first();

                $formStatus['application_id'] = $application->id;
                $formStatus['form_id'] = $form->id;
                ApplicationFormStatus::insertGetId($formStatus);

                $url = route('admin.application.edit',[$application_code,'vehicle-details']);
                return redirect($url)->with('alert-success','Loan Details submitted successfully.');;
            } else {
                return redirect()->back()->with('alert-error','Something Went Wrong!');;
            }
        } elseif($formSlug == 'vehicle-details') {
            // vehicle-details
            $vehicle['application_id'] = $application->id;
            $vehicle['make'] = $request->make ?? NULL;
            $vehicle['vehicle_type'] = $request->vehicle_type ?? NULL;
            $vehicle['model'] = $request->model ?? NULL;
            $vehicle['variant'] = $request->variant ?? NULL;
            $vehicle['year_of_manufacturing'] = $request->year_of_manufacturing ?? NULL;
            $vehicle['valuation'] = $request->valuation ?? NULL;
            $vehicle['finance_amount'] = $request->finance_amount ?? NULL;
            $vehicle['margin'] = $request->margin ?? NULL;
            $vehicle['funding'] = $request->funding ?? NULL;
            $vehicle['scheme_applied'] = $request->scheme_applied ?? NULL;
            $vehicle['months'] = $request->months ?? NULL;
            $vehicle['emi_amount'] = $request->emi_amount ?? NULL;
            $vehicle['customer_irr'] = $request->customer_irr ?? NULL;

            $vehicle['registration_no'] = $request->registration_no ?? NULL;                    
            $vehicle['engine_no'] = $request->engine_no ?? NULL;
            $vehicle['chasis_no'] = $request->chasis_no ?? NULL;
            $vehicle['insurance_company_name'] = $request->insurance_company_name ?? NULL;
            $vehicle['idv'] = $request->idv ?? NULL;
            $vehicle['policy_no'] = $request->policy_no ?? NULL;
            $vehicle['insurance_policy_start_date'] = $request->insurance_policy_start_date ?? NULL;

            $res = Vehicles::insertGetId($vehicle);
            if($res) {

                $form = FormSteps::where('slug',$formSlug)->first();

                $formStatus['application_id'] = $application->id;
                $formStatus['form_id'] = $form->id;
                ApplicationFormStatus::insertGetId($formStatus);

                $url = route('admin.application.edit',[$application_code,'disbursement-details']);
                return redirect($url)->with('alert-success','Vehicle Details submitted successfully.');;
            } else {
                return redirect()->back()->with('alert-error','Something Went Wrong!');;
            }
        } elseif($formSlug == 'disbursement-details') {
            // disursement-details
            $dd['application_id'] = $application->id;
            $dd['bank_name'] = $request->bank_name ?? NULL;
            $dd['vehicle_no'] = $request->vehicle_no ?? NULL;
            $dd['customer_mobile'] = $request->customer_mobile ?? NULL;
            $dd['customer_confirmation'] = $request->customer_confirmation ?? NULL;
            $dd['vehicle_type'] = $request->vehicle_type ?? NULL;
            $dd['make'] = $request->make ?? NULL;
            $dd['model'] = $request->model ?? NULL;
            $dd['variant'] = $request->variant ?? NULL;
            $dd['year_of_manufacturing'] = $request->year_of_manufacturing ?? NULL;
            $dd['loan_amount'] = $request->loan_amount ?? NULL;
            $dd['loan_variation_amount'] = $request->loan_variation_amount ?? NULL;
            $dd['emi_month'] = $request->emi_month ?? NULL;
            $dd['emi_amount'] = $request->emi_amount ?? NULL;
            $dd['emi_starting_date'] = $request->emi_starting_date ?? NULL;
            $dd['sms_send_option'] = $request->sms_send_option ?? NULL;
            $dd['processing_fee'] = $request->processing_fee ?? NULL;
            $dd['stamp_duty'] = $request->stamp_duty ?? NULL;
            $dd['document_charge'] = $request->document_charge ?? NULL;
            $dd['pdd_charge'] = $request->pdd_charge ?? NULL;
            $dd['other_charge'] = $request->other_charge ?? NULL;
            $dd['valuation'] = $request->valuation ?? NULL;
            $dd['insurance'] = $request->insurance ?? NULL;
            $dd['insurance_amount'] = $request->insurance_amount ?? NULL;
            $dd['insurance_funding'] = $request->insurance_funding ?? NULL;
            $dd['payment_receivable'] = $request->payment_receivable ?? NULL;
            $dd['rto_tax'] = $request->rto_tax ?? NULL;
            $dd['rto_charges'] = $request->rto_charges ?? NULL;
            $dd['rto_paper_status'] = $request->rto_paper_status ?? NULL;
            $dd['net_payment'] = $request->net_payment ?? NULL;
            $dd['payment_favour'] = $request->payment_favour ?? NULL;
            $dd['commision_to'] = $request->commision_to ?? NULL;
            $dd['gst'] = $request->gst ?? NULL;
            
            $res = DisbursementDetail::insertGetId($dd);
            if($res) {

                $form = FormSteps::where('slug',$formSlug)->first();

                $formStatus['application_id'] = $application->id;
                $formStatus['form_id'] = $form->id;
                ApplicationFormStatus::insertGetId($formStatus);

                $url = route('admin.home');
                return redirect($url)->with('alert-success','Disbursement Details submitted successfully.');;
            } else {
                return redirect()->back()->with('alert-error','Something Went Wrong!');;
            }
        }    
    }

}
