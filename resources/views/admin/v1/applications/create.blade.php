@extends('admin.v1.common.app')
@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-3">
            @include('admin.v1.applications.appFormSteps')
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show" id="application" role="tabpanel" aria-labelledby="application">
                            <form action="{{ route('admin.application.store') }}" method="POST" id="application-form"> 
                                @csrf
                                <div><h3><u>Application</u></h3></div>
                                <input type="hidden" name="formSlug" id="formSlug" value="application">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="system_date">System Date</label>
                                            <input class="form-control {{ $errors->has('system_date') ? 'is-invalid' : '' }}" type="date" name="system_date" value="<?php echo date('Y-m-d'); ?>" id="system_date" value="{{ old('system_date', '') }}" placeholder="System Date" readonly>
                                            @if($errors->has('system_date'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('system_date') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="user_code">User Code</label>
                                            <input class="form-control {{ $errors->has('user_code') ? 'is-invalid' : '' }}" type="text" name="user_code" value="{{ $user->user_code }}" id="user_code" placeholder="Member Code" readonly>
                                            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                            @if($errors->has('user_id'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('user_id') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="user_name">User Name</label>
                                            <input class="form-control {{ $errors->has('user_name') ? 'is-invalid' : '' }}" type="text" name="user_name" id="user_name" value="{{ $user->name }}" placeholder="User Name" readonly>
                                            @if($errors->has('user_name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('user_name') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="team_code">Team Code</label>
                                            <input class="form-control {{ $errors->has('team_code') ? 'is-invalid' : '' }}" type="text" name="team_code" id="team_code" value="{{ $user->userTeamBranch->team->team_code }}" placeholder="Team Code" readonly>
                                            <input type="hidden" name="team_id" id="team_id" value="{{ $user->userTeamBranch->team_id }}">
                                            @if($errors->has('team_id'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('team_id') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="branch_code">Branch Code</label>
                                            <input class="form-control {{ $errors->has('branch_code') ? 'is-invalid' : '' }}" type="text" name="branch_code" id="branch_code" value="{{ $user->userTeamBranch->branch->branch_code }}" placeholder="Branch Code" readonly>
                                            <input type="hidden" name="branch_id" id="branch_id" value="{{ $user->userTeamBranch->branch_id }}">
                                            @if($errors->has('branch_id'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('branch_id') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h3><u>Source (DD-1)</u></h3></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="source_type">Source DD</label>
                                            <select class="form-control form-select {{ $errors->has('source_type') ? 'is-invalid' : '' }}" name="source_type" id="source_type">
                                                <option value="telecaller" {{ old('source_type') == 'telecaller' ? 'selected' : '' }}>Telecaller</option>
                                                <option value="broker" {{ old('source_type') == 'broker' ? 'selected' : '' }}>Broker</option>
                                                <option value="direct" {{ old('source_type') == 'direct' ? 'selected' : '' }}>Direct</option>
                                                <option value="refferal" {{ old('source_type') == 'refferal' ? 'selected' : '' }}>Refferal</option>
                                            </select>
                                            @if($errors->has('source_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('source_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="source_name">Name</label>
                                            <input class="form-control {{ $errors->has('source_name') ? 'is-invalid' : '' }}" type="text" name="source_name" id="source_name" value="{{ old('source_name', '') }}" placeholder="Name">
                                            @if($errors->has('source_name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('source_name') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="source_email">Email</label>
                                            <input class="form-control {{ $errors->has('source_email') ? 'is-invalid' : '' }}" type="email" name="source_email" id="source_email" value="{{ old('source_email', '') }}" placeholder="Email">
                                            @if($errors->has('source_email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('source_email') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="source_contact">Contact No.</label>
                                            <input class="form-control {{ $errors->has('source_contact') ? 'is-invalid' : '' }}" type="text" name="source_contact" id="source_contact" value="{{ old('source_contact', '') }}" placeholder="Contact No.">
                                            @if($errors->has('source_contact'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('source_contact') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="source_gst_no">GST No.</label>
                                            <input class="form-control {{ $errors->has('source_gst_no') ? 'is-invalid' : '' }}" type="text" name="source_gst_no" id="source_gst_no" value="{{ old('source_gst_no', '') }}" placeholder="GST No.">
                                            @if($errors->has('source_gst_no'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('source_gst_no') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h3><u>Business Details</u></h3></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="b_bank_type">Finance/Bank Type</label>
                                            <input class="form-control {{ $errors->has('b_bank_type') ? 'is-invalid' : '' }}" type="text" name="b_bank_type" id="b_bank_type" value="{{ old('b_bank_type', '') }}" placeholder="Finance/Bank Type">
                                            @if($errors->has('b_bank_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('b_bank_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="b_profile_type">Profile Type</label>
                                            <select class="form-control form-select {{ $errors->has('b_profile_type') ? 'is-invalid' : '' }}" name="b_profile_type" id="b_profile_type">
                                                <option value="self_employed" {{ old('b_profile_type') == 'self_employed' ? 'selected' : '' }}>Self Employed</option>
                                                <option value="salaried" {{ old('b_profile_type') == 'salaried' ? 'selected' : '' }}>Salaried</option>
                                            </select>
                                            @if($errors->has('b_profile_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('b_profile_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6" id="other-dd" style="display: none;">
                                        <div class="form-group">
                                            <label class="required" for="b_other_dd_type">Other DD</label>
                                            <select class="form-control form-select {{ $errors->has('b_other_dd_type') ? 'is-invalid' : '' }}" name="b_other_dd_type" id="b_other_dd_type">
                                                <option value="" {{ old('b_other_dd_type') == '' ? 'selected' : '' }}>Select DD</option>
                                                <option value="proprietor" {{ old('b_other_dd_type') == 'proprietor' ? 'selected' : '' }}>Proprietor</option>
                                                <option value="partner" {{ old('b_other_dd_type') == 'partner' ? 'selected' : '' }}>Partner</option>
                                                <option value="agriculture" {{ old('b_other_dd_type') == 'agriculture' ? 'selected' : '' }}>Agriculture</option>
                                                <option value="others" {{ old('b_other_dd_type') == 'others' ? 'selected' : '' }}>Others</option>
                                            </select>
                                            @if($errors->has('b_other_dd_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('b_other_dd_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="b_company_name">Company Name</label>
                                            <input class="form-control {{ $errors->has('b_company_name') ? 'is-invalid' : '' }}" type="text" name="b_company_name" id="b_company_name" value="{{ old('b_company_name', '') }}" placeholder="Company Name">
                                            @if($errors->has('b_company_name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('b_company_name') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="b_company_type">Company Type</label>
                                            <select class="form-control form-select {{ $errors->has('b_company_type') ? 'is-invalid' : '' }}" name="b_company_type" id="b_company_type">
                                                <option value="private_limited" {{ old('b_company_type') == 'private_limited' ? 'selected' : '' }}>Private Limited</option>
                                                <option value="limited" {{ old('b_company_type') == 'limited' ? 'selected' : '' }}>Limited</option>
                                                <option value="llp" {{ old('b_company_type') == 'llp' ? 'selected' : '' }}>Limited Liability Partnership (LLP)</option>
                                            </select>
                                            @if($errors->has('b_company_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('b_company_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="personal-details" role="tabpanel" aria-labelledby="personal-details">
                            <form action="{{ route('admin.application.update',[$applicationCode,'personal-details']) }}" method="POST" id="personal-details-form"> 
                                @csrf
                                <div>
                                    <h3>
                                        <u>Personal Details</u>
                                        <i class="pull-right"><u>{{ $applicationCode }}</u></i>
                                    </h3>
                                </div>
                                <input type="hidden" name="formSlug" id="formSlug" value="personal-details">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="applicant_name">Main Applicant</label>
                                            <input class="form-control {{ $errors->has('applicant_name') ? 'is-invalid' : '' }}" type="text" name="applicant_name" id="applicant_name" value="{{ old('applicant_name', '') }}" placeholder="Applciant Name">
                                            @if($errors->has('applicant_name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('applicant_name') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="applicant_designation_type">Designation Type</label>
                                            <select class="form-control form-select {{ $errors->has('applicant_designation_type') ? 'is-invalid' : '' }}" name="applicant_designation_type" id="applicant_designation_type">
                                                <option value="" {{ old('applicant_designation_type') == '' ? 'selected' : '' }}>Select Type</option>
                                                <option value="proprietor" {{ old('applicant_designation_type') == 'proprietor' ? 'selected' : '' }}>Proprietor</option>
                                                <option value="partner" {{ old('applicant_designation_type') == 'partner' ? 'selected' : '' }}>Partner</option>
                                                <option value="agriculture" {{ old('applicant_designation_type') == 'agriculture' ? 'selected' : '' }}>Agriculture</option>
                                                <option value="others" {{ old('applicant_designation_type') == 'others' ? 'selected' : '' }}>Others</option>
                                            </select>
                                            @if($errors->has('applicant_designation_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('applicant_designation_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="applicant_contact_person">Contact Person</label>
                                            <input class="form-control {{ $errors->has('applicant_contact_person') ? 'is-invalid' : '' }}" type="text" name="applicant_contact_person" id="applicant_contact_person" value="{{ old('applicant_contact_person', '') }}" placeholder="Contact Person">
                                            @if($errors->has('applicant_contact_person'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('applicant_contact_person') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="applicant_contact">Contact No.</label>
                                            <input class="form-control {{ $errors->has('applicant_contact') ? 'is-invalid' : '' }}" type="text" name="applicant_contact" id="applicant_contact" value="{{ old('applicant_contact', '') }}" placeholder="Contact No.">
                                            @if($errors->has('applicant_contact'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('applicant_contact') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="applciant_other_contact">Other Contact No.</label>
                                            <input class="form-control {{ $errors->has('applciant_other_contact') ? 'is-invalid' : '' }}" type="text" name="applciant_other_contact" id="applciant_other_contact" value="{{ old('applciant_other_contact', '') }}" placeholder="Other Contact No.">
                                            @if($errors->has('applciant_other_contact'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('applciant_other_contact') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="applicant_email">Email Id</label>
                                            <input class="form-control {{ $errors->has('applicant_email') ? 'is-invalid' : '' }}" type="email" name="applicant_email" id="applicant_email" value="{{ old('applicant_email', '') }}" placeholder="Email Id">
                                            @if($errors->has('applicant_email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('applicant_email') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="applicant_dob">Date of Birth</label>
                                            <input class="form-control {{ $errors->has('applicant_dob') ? 'is-invalid' : '' }}" type="date" name="applicant_dob" id="applicant_dob" value="{{ old('applicant_dob', '') }}" placeholder="Date of Birth">
                                            @if($errors->has('applicant_dob'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('applicant_dob') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h3><u>Resident Details</u></h3></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="resident_type">Resident Type</label>
                                            <select class="form-control form-select {{ $errors->has('resident_type') ? 'is-invalid' : '' }}" name="resident_type" id="resident_type">
                                                <option value="owned" {{ old('resident_type') == 'owned' ? 'selected' : '' }}>Owned</option>
                                                <option value="rented" {{ old('resident_type') == 'rented' ? 'selected' : '' }}>Rented</option>
                                            </select>
                                            @if($errors->has('resident_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resident_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h5><u>Current Address</u></h5></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rc_address">Current Address</label>
                                            <input class="form-control {{ $errors->has('rc_address') ? 'is-invalid' : '' }}" type="text" name="rc_address" id="rc_address" value="{{ old('rc_address', '') }}" placeholder="Current Address">
                                            @if($errors->has('rc_address'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rc_address') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rc_area">Current Area</label>
                                            <input class="form-control {{ $errors->has('rc_area') ? 'is-invalid' : '' }}" type="text" name="rc_area" id="rc_area" value="{{ old('rc_area', '') }}" placeholder="Current Area">
                                            @if($errors->has('rc_area'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rc_area') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rc_city">Current City</label>
                                            <input class="form-control {{ $errors->has('rc_city') ? 'is-invalid' : '' }}" type="text" name="rc_city" id="rc_city" value="{{ old('rc_city', '') }}" placeholder="Current City">
                                            @if($errors->has('rc_city'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rc_city') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rc_state">Current State</label>
                                            <input class="form-control {{ $errors->has('rc_state') ? 'is-invalid' : '' }}" type="text" name="rc_state" id="rc_state" value="{{ old('rc_state', '') }}" placeholder="Current State">
                                            @if($errors->has('rc_state'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rc_state') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h5><u>Permanent Address</u></h5></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rp_address">Permanent Address</label>
                                            <input class="form-control {{ $errors->has('rp_address') ? 'is-invalid' : '' }}" type="text" name="rp_address" id="rp_address" value="{{ old('rp_address', '') }}" placeholder="Permanent Address">
                                            @if($errors->has('rp_address'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rp_address') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rp_area">Permanent Area</label>
                                            <input class="form-control {{ $errors->has('rp_area') ? 'is-invalid' : '' }}" type="text" name="rp_area" id="rp_area" value="{{ old('rp_area', '') }}" placeholder="Permanent Area">
                                            @if($errors->has('rp_area'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rp_area') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rp_city">Permanent City</label>
                                            <input class="form-control {{ $errors->has('rp_city') ? 'is-invalid' : '' }}" type="text" name="rp_city" id="rp_city" value="{{ old('rp_city', '') }}" placeholder="Permanent City">
                                            @if($errors->has('rp_city'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rp_city') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rp_state">Permanent State</label>
                                            <input class="form-control {{ $errors->has('rp_state') ? 'is-invalid' : '' }}" type="text" name="rp_state" id="rp_state" value="{{ old('rp_state', '') }}" placeholder="Permanent State">
                                            @if($errors->has('rp_state'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rp_state') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h3><u>Office Details</u></h3></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="o_company_name">Company Name</label>
                                            <input class="form-control {{ $errors->has('o_company_name') ? 'is-invalid' : '' }}" type="text" name="o_company_name" id="o_company_name" value="{{ old('o_company_name', '') }}" placeholder="Company Name">
                                            @if($errors->has('o_company_name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('o_company_name') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="o_address">Office Address</label>
                                            <input class="form-control {{ $errors->has('o_address') ? 'is-invalid' : '' }}" type="text" name="o_address" id="o_address" value="{{ old('o_address', '') }}" placeholder="Office Address">
                                            @if($errors->has('o_address'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('o_address') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="o_area">Area</label>
                                            <input class="form-control {{ $errors->has('o_area') ? 'is-invalid' : '' }}" type="text" name="o_area" id="o_area" value="{{ old('o_area', '') }}" placeholder="Area">
                                            @if($errors->has('o_area'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('o_area') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="o_city">City</label>
                                            <input class="form-control {{ $errors->has('o_city') ? 'is-invalid' : '' }}" type="text" name="o_city" id="o_city" value="{{ old('o_city', '') }}" placeholder="City">
                                            @if($errors->has('o_city'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('o_city') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="o_state">State</label>
                                            <input class="form-control {{ $errors->has('o_state') ? 'is-invalid' : '' }}" type="text" name="o_state" id="o_state" value="{{ old('o_state', '') }}" placeholder="Office State">
                                            @if($errors->has('o_state'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('o_state') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="o_landmark">Landmark</label>
                                            <input class="form-control {{ $errors->has('o_landmark') ? 'is-invalid' : '' }}" type="text" name="o_landmark" id="o_landmark" value="{{ old('o_landmark', '') }}" placeholder="Office Landmark">
                                            @if($errors->has('o_landmark'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('o_landmark') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="o_pincode">Office Pincode</label>
                                            <input class="form-control {{ $errors->has('o_pincode') ? 'is-invalid' : '' }}" type="text" name="o_pincode" id="o_pincode" value="{{ old('o_pincode', '') }}" placeholder="Office Pincode">
                                            @if($errors->has('o_pincode'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('o_pincode') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="loan-details" role="tabpanel" aria-labelledby="loan-details">
                            <form action="{{ route('admin.application.update',[$applicationCode,'loan-details']) }}" method="POST" id="loan-details-form">
                                @csrf
                                <div>
                                    <h3>
                                        <u>Loan Details</u>
                                        <i class="pull-right"><u>{{ $applicationCode }}</u></i>
                                    </h3>
                                </div>
                                <input type="hidden" name="formSlug" id="formSlug" value="loan-details">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="loan_type">Loan Type</label>
                                            <select class="form-control form-select {{ $errors->has('loan_type') ? 'is-invalid' : '' }}" name="loan_type" id="loan_type">
                                                <option value="auto_loan" {{ old('loan_type') == 'auto_loan' ? 'selected' : '' }}>Auto Loan</option>
                                                <option value="commercial_vehicle" {{ old('loan_type') == 'commercial_vehicle' ? 'selected' : '' }}>Commercial Loan</option>
                                                <option value="home_loan" {{ old('loan_type') == 'home_loan' ? 'selected' : '' }}>Home Loan</option>
                                                <option value="personal_loan" {{ old('loan_type') == 'personal_loan' ? 'selected' : '' }}>Personal Loan</option>
                                                <option value="business_loan" {{ old('loan_type') == 'business_loan' ? 'selected' : '' }}>Business Loan</option>
                                                <option value="gold_loan" {{ old('loan_type') == 'gold_loan' ? 'selected' : '' }}>Gold Loan</option>
                                            </select>
                                            @if($errors->has('loan_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('loan_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6" id="auto-loan" style="display: none;">
                                        <div class="form-group">
                                            <label class="required" for="autoloan_type">Auto Loan</label>
                                            <select class="form-control form-select {{ $errors->has('autoloan_type') ? 'is-invalid' : '' }}" name="autoloan_type" id="autoloan_type">
                                                <option value="" {{ old('autoloan_type') == '' ? 'selected' : '' }}>Select Auto Loan Type</option>
                                                <option value="new" {{ old('autoloan_type') == 'new' ? 'selected' : '' }}>New</option>
                                                <option value="used" {{ old('autoloan_type') == 'used' ? 'selected' : '' }}>Used</option>
                                                <option value="refinance" {{ old('autoloan_type') == 'refinance' ? 'selected' : '' }}>Refinance</option>
                                                <option value="purchased" {{ old('autoloan_type') == 'purchased' ? 'selected' : '' }}>Purchased</option>
                                                <option value="bt" {{ old('autoloan_type') == 'bt' ? 'selected' : '' }}>BT</option>
                                                <option value="bt_topup" {{ old('autoloan_type') == 'bt_topup' ? 'selected' : '' }}>BT Top Up</option>
                                            </select>
                                            @if($errors->has('autoloan_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('autoloan_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6" id="home-loan" style="display: none;">
                                        <div class="form-group">
                                            <label class="required" for="homeloan_type">Home Loan</label>
                                            <select class="form-control form-select {{ $errors->has('homeloan_type') ? 'is-invalid' : '' }}" name="homeloan_type" id="homeloan_type">
                                                <option value="" {{ old('homeloan_type') == '' ? 'selected' : '' }}>Select Home Loan Type</option>
                                                <option value="lap" {{ old('homeloan_type') == 'lap' ? 'selected' : '' }}>LAP</option>
                                                <option value="bt_topup" {{ old('homeloan_type') == 'bt_topup' ? 'selected' : '' }}>BT Top Up</option>
                                                <option value="hl" {{ old('homeloan_type') == 'hl' ? 'selected' : '' }}>HL</option>
                                            </select>
                                            @if($errors->has('homeloan_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('homeloan_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h3><u>References (Used/Broker ref.)</u></h3></div>
                                <div><h5><u>Option1</u></h5></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="ref_name[0]">Name</label>
                                            <input class="form-control {{ $errors->has('ref_name[0]') ? 'is-invalid' : '' }}" type="text" name="ref_name[0]" id="ref_name[0]" value="{{ old('ref_name[0]', '') }}" placeholder="Name">
                                            @if($errors->has('ref_name[0]'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ref_name[0]') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="ref_address[0]">Address</label>
                                            <input class="form-control {{ $errors->has('ref_address[0]') ? 'is-invalid' : '' }}" type="text" name="ref_address[0]" id="ref_address[0]" value="{{ old('ref_address[0]', '') }}" placeholder="Address">
                                            @if($errors->has('ref_address[0]'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ref_address[0]') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="ref_mobile[0]">Mobile No.</label>
                                            <input class="form-control {{ $errors->has('ref_mobile[0]') ? 'is-invalid' : '' }}" type="text" name="ref_mobile[0]" id="ref_mobile[0]" value="{{ old('ref_mobile[0]', '') }}" placeholder="Mobile No.">
                                            @if($errors->has('ref_mobile[0]'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ref_mobile[0]') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="ref_relationship[0]">Relationship</label>
                                            <select class="form-control form-select {{ $errors->has('ref_relationship[0]') ? 'is-invalid' : '' }}" name="ref_relationship[0]" id="ref_relationship[0]">
                                                <option value="" {{ old('ref_relationship[0]') == '' ? 'selected' : '' }}>Select Relationship</option>
                                                <option value="husbund" {{ old('ref_relationship[0]') == 'husbund' ? 'selected' : '' }}>Husbund</option>
                                                <option value="wife" {{ old('ref_relationship[0]') == 'wife' ? 'selected' : '' }}>Wife</option>
                                                <option value="son" {{ old('ref_relationship[0]') == 'son' ? 'selected' : '' }}>Son</option>
                                                <option value="daughter" {{ old('ref_relationship[0]') == 'daughter' ? 'selected' : '' }}>Daughter</option>
                                                <option value="uncle" {{ old('ref_relationship[0]') == 'uncle' ? 'selected' : '' }}>Uncle</option>
                                                <option value="father" {{ old('ref_relationship[0]') == 'father' ? 'selected' : '' }}>Father</option>
                                                <option value="mother" {{ old('ref_relationship[0]') == 'mother' ? 'selected' : '' }}>Mother</option>
                                            </select>
                                            @if($errors->has('ref_relationship[0]'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ref_relationship[0]') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h5><u>Option2</u></h5></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="ref_name[1]">Name</label>
                                            <input class="form-control {{ $errors->has('ref_name[1]') ? 'is-invalid' : '' }}" type="text" name="ref_name[1]" id="ref_name[1]" value="{{ old('ref_name[1]', '') }}" placeholder="Name">
                                            @if($errors->has('ref_name[1]'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ref_name[1]') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="ref_address[1]">Address</label>
                                            <input class="form-control {{ $errors->has('ref_address[1]') ? 'is-invalid' : '' }}" type="text" name="ref_address[1]" id="ref_address[1]" value="{{ old('ref_address[1]', '') }}" placeholder="Address">
                                            @if($errors->has('ref_address[1]'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ref_address[1]') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="ref_mobile[1]">Mobile No.</label>
                                            <input class="form-control {{ $errors->has('ref_mobile[1]') ? 'is-invalid' : '' }}" type="text" name="ref_mobile[1]" id="ref_mobile[1]" value="{{ old('ref_mobile[1]', '') }}" placeholder="Mobile No.">
                                            @if($errors->has('ref_mobile[1]'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ref_mobile[1]') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="ref_relationship[1]">Relationship</label>
                                            <select class="form-control form-select {{ $errors->has('ref_relationship[1]') ? 'is-invalid' : '' }}" name="ref_relationship[1]" id="ref_relationship[1]">
                                                <option value="" {{ old('ref_relationship[1]') == '' ? 'selected' : '' }}>Select Relationship</option>
                                                <option value="husbund" {{ old('ref_relationship[1]') == 'husbund' ? 'selected' : '' }}>Husbund</option>
                                                <option value="wife" {{ old('ref_relationship[1]') == 'wife' ? 'selected' : '' }}>Wife</option>
                                                <option value="son" {{ old('ref_relationship[1]') == 'son' ? 'selected' : '' }}>Son</option>
                                                <option value="daughter" {{ old('ref_relationship[1]') == 'daughter' ? 'selected' : '' }}>Daughter</option>
                                                <option value="uncle" {{ old('ref_relationship[1]') == 'uncle' ? 'selected' : '' }}>Uncle</option>
                                                <option value="father" {{ old('ref_relationship[1]') == 'father' ? 'selected' : '' }}>Father</option>
                                                <option value="mother" {{ old('ref_relationship[1]') == 'mother' ? 'selected' : '' }}>Mother</option>
                                            </select>
                                            @if($errors->has('ref_relationship[1]'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ref_relationship[1]') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <h5>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="co_applicant" id="co_applicant" type="checkbox" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Co-applicant
                                                    </label>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                </div>
                                <div id="co-applicant" style="display: none;">
                                    <div><h3><u>Co-applicant Details</u></h3></div>
                                    <div><h5><u>Option1</u></h5></div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_name[0]">Name</label>
                                                <input class="form-control {{ $errors->has('co_applicant_name[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_name[0]" id="co_applicant_name[0]" value="{{ old('co_applicant_name[0]', '') }}" placeholder="Name">
                                                @if($errors->has('co_applicant_name[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_name[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_address[0]">Address</label>
                                                <input class="form-control {{ $errors->has('co_applicant_address[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_address[0]" id="co_applicant_address[0]" value="{{ old('co_applicant_address[0]', '') }}" placeholder="Address">
                                                @if($errors->has('co_applicant_address[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_address[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_mobile[0]">Mobile No.</label>
                                                <input class="form-control {{ $errors->has('co_applicant_mobile[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_mobile[0]" id="co_applicant_mobile[0]" value="{{ old('co_applicant_mobile[0]', '') }}" placeholder="Mobile No.">
                                                @if($errors->has('co_applicant_mobile[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_mobile[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_relationship[1]">Relationship</label>
                                                <select class="form-control form-select {{ $errors->has('co_applicant_relationship[1]') ? 'is-invalid' : '' }}" name="co_applicant_relationship[1]" id="co_applicant_relationship[1]">
                                                    <option value="" {{ old('co_applicant_relationship[1]') == '' ? 'selected' : '' }}>Select Relationship</option>
                                                    <option value="husbund" {{ old('co_applicant_relationship[1]') == 'husbund' ? 'selected' : '' }}>Husbund</option>
                                                    <option value="wife" {{ old('co_applicant_relationship[1]') == 'wife' ? 'selected' : '' }}>Wife</option>
                                                    <option value="son" {{ old('co_applicant_relationship[1]') == 'son' ? 'selected' : '' }}>Son</option>
                                                    <option value="daughter" {{ old('co_applicant_relationship[1]') == 'daughter' ? 'selected' : '' }}>Daughter</option>
                                                    <option value="uncle" {{ old('co_applicant_relationship[1]') == 'uncle' ? 'selected' : '' }}>Uncle</option>
                                                    <option value="father" {{ old('co_applicant_relationship[1]') == 'father' ? 'selected' : '' }}>Father</option>
                                                    <option value="mother" {{ old('co_applicant_relationship[1]') == 'mother' ? 'selected' : '' }}>Mother</option>
                                                </select>
                                                @if($errors->has('co_applicant_relationship[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_relationship[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_company_name[0]">Company Name</label>
                                                <input class="form-control {{ $errors->has('co_applicant_company_name[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_company_name[0]" id="co_applicant_company_name[0]" value="{{ old('co_applicant_company_name[0]', '') }}" placeholder="Company Name">
                                                @if($errors->has('co_applicant_company_name[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_company_name[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_company_addess[0]">Company Address</label>
                                                <input class="form-control {{ $errors->has('co_applicant_company_addess[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_company_addess[0]" id="co_applicant_company_addess[0]" value="{{ old('co_applicant_company_addess[0]', '') }}" placeholder="Company Address">
                                                @if($errors->has('co_applicant_company_addess[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_company_addess[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_area[0]">Area</label>
                                                <input class="form-control {{ $errors->has('co_applicant_area[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_area[0]" id="co_applicant_area[0]" value="{{ old('co_applicant_area[0]', '') }}" placeholder="Area">
                                                @if($errors->has('co_applicant_area[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_area[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_city[0]">City</label>
                                                <input class="form-control {{ $errors->has('co_applicant_city[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_city[0]" id="co_applicant_city[0]" value="{{ old('co_applicant_city[0]', '') }}" placeholder="City">
                                                @if($errors->has('co_applicant_city[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_city[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_state[0]">State</label>
                                                <input class="form-control {{ $errors->has('co_applicant_state[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_state[0]" id="co_applicant_state[0]" value="{{ old('co_applicant_state[0]', '') }}" placeholder="State">
                                                @if($errors->has('co_applicant_state[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_state[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_landmark[0]">Landmark</label>
                                                <input class="form-control {{ $errors->has('co_applicant_landmark[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_landmark[0]" id="co_applicant_landmark[0]" value="{{ old('co_applicant_landmark[0]', '') }}" placeholder="Landmark">
                                                @if($errors->has('co_applicant_landmark[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_landmark[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_pincode[0]">Pincode</label>
                                                <input class="form-control {{ $errors->has('co_applicant_pincode[0]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_pincode[0]" id="co_applicant_pincode[0]" value="{{ old('co_applicant_pincode[0]', '') }}" placeholder="Pincode">
                                                @if($errors->has('co_applicant_pincode[0]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_pincode[0]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div><h5><u>Option2</u></h5></div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_name[1]">Name</label>
                                                <input class="form-control {{ $errors->has('co_applicant_name[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_name[1]" id="co_applicant_name[1]" value="{{ old('co_applicant_name[1]', '') }}" placeholder="Name">
                                                @if($errors->has('co_applicant_name[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_name[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_address[1]">Address</label>
                                                <input class="form-control {{ $errors->has('co_applicant_address[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_address[1]" id="co_applicant_address[1]" value="{{ old('co_applicant_address[1]', '') }}" placeholder="Address">
                                                @if($errors->has('co_applicant_address[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_address[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_mobile[1]">Mobile No.</label>
                                                <input class="form-control {{ $errors->has('co_applicant_mobile[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_mobile[1]" id="co_applicant_mobile[1]" value="{{ old('co_applicant_mobile[1]', '') }}" placeholder="Mobile No.">
                                                @if($errors->has('co_applicant_mobile[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_mobile[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_relationship[1]">Relationship</label>
                                                <select class="form-control form-select {{ $errors->has('co_applicant_relationship[1]') ? 'is-invalid' : '' }}" name="co_applicant_relationship[1]" id="co_applicant_relationship[1]">
                                                    <option value="" {{ old('co_applicant_relationship[1]') == '' ? 'selected' : '' }}>Select Relationship</option>
                                                    <option value="husbund" {{ old('co_applicant_relationship[1]') == 'husbund' ? 'selected' : '' }}>Husbund</option>
                                                    <option value="wife" {{ old('co_applicant_relationship[1]') == 'wife' ? 'selected' : '' }}>Wife</option>
                                                    <option value="son" {{ old('co_applicant_relationship[1]') == 'son' ? 'selected' : '' }}>Son</option>
                                                    <option value="daughter" {{ old('co_applicant_relationship[1]') == 'daughter' ? 'selected' : '' }}>Daughter</option>
                                                    <option value="uncle" {{ old('co_applicant_relationship[1]') == 'uncle' ? 'selected' : '' }}>Uncle</option>
                                                    <option value="father" {{ old('co_applicant_relationship[1]') == 'father' ? 'selected' : '' }}>Father</option>
                                                    <option value="mother" {{ old('co_applicant_relationship[1]') == 'mother' ? 'selected' : '' }}>Mother</option>
                                                </select>
                                                @if($errors->has('co_applicant_relationship[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_relationship[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_company_name[1]">Company Name</label>
                                                <input class="form-control {{ $errors->has('co_applicant_company_name[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_company_name[1]" id="co_applicant_company_name[1]" value="{{ old('co_applicant_company_name[1]', '') }}" placeholder="Company Name">
                                                @if($errors->has('co_applicant_company_name[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_company_name[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_company_addess[1]">Company Address</label>
                                                <input class="form-control {{ $errors->has('co_applicant_company_addess[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_company_addess[1]" id="co_applicant_company_addess[1]" value="{{ old('co_applicant_company_addess[1]', '') }}" placeholder="Company Address">
                                                @if($errors->has('co_applicant_company_addess[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_company_addess[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_area[1]">Area</label>
                                                <input class="form-control {{ $errors->has('co_applicant_area[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_area[1]" id="co_applicant_area[1]" value="{{ old('co_applicant_area[1]', '') }}" placeholder="Area">
                                                @if($errors->has('co_applicant_area[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_area[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_city[1]">City</label>
                                                <input class="form-control {{ $errors->has('co_applicant_city[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_city[1]" id="co_applicant_city[1]" value="{{ old('co_applicant_city[1]', '') }}" placeholder="City">
                                                @if($errors->has('co_applicant_city[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_city[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_state[1]">State</label>
                                                <input class="form-control {{ $errors->has('co_applicant_state[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_state[1]" id="co_applicant_state[1]" value="{{ old('co_applicant_state[1]', '') }}" placeholder="State">
                                                @if($errors->has('co_applicant_state[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_state[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_landmark[1]">Landmark</label>
                                                <input class="form-control {{ $errors->has('co_applicant_landmark[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_landmark[1]" id="co_applicant_landmark[1]" value="{{ old('co_applicant_landmark[1]', '') }}" placeholder="Landmark">
                                                @if($errors->has('co_applicant_landmark[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_landmark[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label class="" for="co_applicant_pincode[1]">Pincode</label>
                                                <input class="form-control {{ $errors->has('co_applicant_pincode[1]') ? 'is-invalid' : '' }}" type="text" name="co_applicant_pincode[1]" id="co_applicant_pincode[1]" value="{{ old('co_applicant_pincode[1]', '') }}" placeholder="Pincode">
                                                @if($errors->has('co_applicant_pincode[1]'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('co_applicant_pincode[1]') }}
                                                    </div>
                                                @endif
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="vehicle-details" role="tabpanel" aria-labelledby="vehicle-details">
                            <form action="{{ route('admin.application.update',[$applicationCode,'vehicle-details']) }}" method="POST" id="vehicle-details-form">
                                @csrf
                                <div>
                                    <h3>
                                        <u>Vehicle Details</u>
                                        <i class="pull-right"><u>{{ $applicationCode }}</u></i>
                                    </h3>
                                </div>
                                <input type="hidden" name="formSlug" id="formSlug" value="vehicle-details">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="make">Make</label>
                                            <input class="form-control {{ $errors->has('make') ? 'is-invalid' : '' }}" type="text" name="make" id="make" value="{{ old('make', '') }}" placeholder="Make">
                                            @if($errors->has('make'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('make') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="vehicle_type">Vehicle Type</label>
                                            <select class="form-control form-select {{ $errors->has('vehicle_type') ? 'is-invalid' : '' }}" name="vehicle_type" id="vehicle_type">
                                                <option value="" {{ old('vehicle_type') == '' ? 'selected' : '' }}>Select Type</option>
                                                <option value="two_wheeler" {{ old('vehicle_type') == 'two_wheeler' ? 'selected' : '' }}>Two Wheeler</option>
                                                <option value="three_wheeler" {{ old('vehicle_type') == 'three_wheeler' ? 'selected' : '' }}>Three Wheeler</option>
                                                <option value="four_wheeler" {{ old('vehicle_type') == 'four_wheeler' ? 'selected' : '' }}>Four Wheeler</option>
                                            </select>
                                            @if($errors->has('vehicle_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('vehicle_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="model">Model</label>
                                            <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', '') }}" placeholder="Model">
                                            @if($errors->has('model'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('model') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="variant">Variant</label>
                                            <input class="form-control {{ $errors->has('variant') ? 'is-invalid' : '' }}" type="text" name="variant" id="variant" value="{{ old('variant', '') }}" placeholder="Variant">
                                            @if($errors->has('variant'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('variant') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="year_of_manufacturing">Year of Manufacturing</label>
                                            <input class="form-control {{ $errors->has('year_of_manufacturing') ? 'is-invalid' : '' }}" type="text" name="year_of_manufacturing" id="year_of_manufacturing" value="{{ old('year_of_manufacturing', '') }}" placeholder="Year of Manufacturing">
                                            @if($errors->has('year_of_manufacturing'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('year_of_manufacturing') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="valuation">Valuation/Quotation</label>
                                            <input class="form-control {{ $errors->has('valuation') ? 'is-invalid' : '' }}" type="text" name="valuation" id="valuation" value="{{ old('valuation', '') }}" placeholder="Valuation/Quotation">
                                            @if($errors->has('valuation'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('valuation') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="finance_amount">Finance Amount</label>
                                            <input class="form-control {{ $errors->has('finance_amount') ? 'is-invalid' : '' }}" type="text" name="finance_amount" id="finance_amount" value="{{ old('finance_amount', '') }}" placeholder="Finance Amount">
                                            @if($errors->has('finance_amount'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('finance_amount') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="margin">Margin</label>
                                            <input class="form-control {{ $errors->has('margin') ? 'is-invalid' : '' }}" type="text" name="margin" id="margin" value="{{ old('margin', '') }}" placeholder="Margin" readonly>
                                            @if($errors->has('margin'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('margin') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="funding">Funding in %</label>
                                            <input class="form-control {{ $errors->has('funding') ? 'is-invalid' : '' }}" type="text" name="funding" id="funding" value="{{ old('funding', '') }}" placeholder="Funding in %" readonly>
                                            @if($errors->has('funding'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('funding') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="scheme_applied">Scheme Applied</label>
                                            <input class="form-control {{ $errors->has('scheme_applied') ? 'is-invalid' : '' }}" type="text" name="scheme_applied" id="scheme_applied" value="{{ old('scheme_applied', '') }}" placeholder="Scheme Applied">
                                            @if($errors->has('scheme_applied'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('scheme_applied') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="months">Months</label>
                                            <select class="form-control form-select {{ $errors->has('months') ? 'is-invalid' : '' }}" name="months" id="months">
                                                <option value="" {{ old('months') == '' ? 'selected' : '' }}>Select Months</option>
                                                <option value="1" {{ old('months') == '1' ? 'selected' : '' }}>1</option>
                                                <option value="2" {{ old('months') == '2' ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ old('months') == '3' ? 'selected' : '' }}>3</option>
                                                <option value="4" {{ old('months') == '4' ? 'selected' : '' }}>4</option>
                                                <option value="5" {{ old('months') == '5' ? 'selected' : '' }}>5</option>
                                                <option value="6" {{ old('months') == '6' ? 'selected' : '' }}>6</option>
                                                <option value="7" {{ old('months') == '7' ? 'selected' : '' }}>7</option>
                                                <option value="8" {{ old('months') == '8' ? 'selected' : '' }}>8</option>
                                                <option value="9" {{ old('months') == '9' ? 'selected' : '' }}>9</option>
                                                <option value="10" {{ old('months') == '10' ? 'selected' : '' }}>10</option>
                                                <option value="11" {{ old('months') == '11' ? 'selected' : '' }}>11</option>
                                                <option value="12" {{ old('months') == '12' ? 'selected' : '' }}>12</option>
                                            </select>
                                            @if($errors->has('months'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('months') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="emi_amount">EMI Amount</label>
                                            <input class="form-control {{ $errors->has('emi_amount') ? 'is-invalid' : '' }}" type="text" name="emi_amount" id="emi_amount" value="{{ old('emi_amount', '') }}" placeholder="EMI Amount">
                                            @if($errors->has('emi_amount'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('emi_amount') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="" for="customer_irr">Customer IRR</label>
                                            <input class="form-control {{ $errors->has('customer_irr') ? 'is-invalid' : '' }}" type="text" name="customer_irr" id="customer_irr" value="{{ old('customer_irr', '') }}" placeholder="Customer IRR">
                                            @if($errors->has('customer_irr'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('customer_irr') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div><h3><u>Vehicle Registration</u></h3></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="registration_no">Registration No.</label>
                                            <input class="form-control {{ $errors->has('registration_no') ? 'is-invalid' : '' }}" type="text" name="registration_no" id="registration_no" value="{{ old('registration_no', '') }}" placeholder="Registration No.">
                                            @if($errors->has('registration_no'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('registration_no') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="engine_no">Engine No.</label>
                                            <input class="form-control {{ $errors->has('engine_no') ? 'is-invalid' : '' }}" type="text" name="engine_no" id="engine_no" value="{{ old('engine_no', '') }}" placeholder="Engine No.">
                                            @if($errors->has('engine_no'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('engine_no') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="chasis_no">Chasis No.</label>
                                            <input class="form-control {{ $errors->has('chasis_no') ? 'is-invalid' : '' }}" type="text" name="chasis_no" id="chasis_no" value="{{ old('chasis_no', '') }}" placeholder="Chasis No.">
                                            @if($errors->has('chasis_no'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('chasis_no') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="insurance_company_name">Insurance Company Name</label>
                                            <input class="form-control {{ $errors->has('insurance_company_name') ? 'is-invalid' : '' }}" type="text" name="insurance_company_name" id="insurance_company_name" value="{{ old('insurance_company_name', '') }}" placeholder="Insurance Company Name">
                                            @if($errors->has('insurance_company_name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('insurance_company_name') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="idv">IDV</label>
                                            <input class="form-control {{ $errors->has('idv') ? 'is-invalid' : '' }}" type="text" name="idv" id="idv" value="{{ old('idv', '') }}" placeholder="IDV">
                                            @if($errors->has('idv'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('idv') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="policy_no">Cover Note/Policy No.</label>
                                            <input class="form-control {{ $errors->has('policy_no') ? 'is-invalid' : '' }}" type="text" name="policy_no" id="policy_no" value="{{ old('policy_no', '') }}" placeholder="Cover Note/Policy No.">
                                            @if($errors->has('policy_no'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('policy_no') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="insurance_policy_start_date">Insurance Policy Start Date</label>
                                            <input class="form-control {{ $errors->has('insurance_policy_start_date') ? 'is-invalid' : '' }}" type="date" name="insurance_policy_start_date" id="insurance_policy_start_date" value="{{ old('insurance_policy_start_date', '') }}" placeholder="Insurance Policy Start Date">
                                            @if($errors->has('insurance_policy_start_date'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('insurance_policy_start_date') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show" id="disbursement-details" role="tabpanel" aria-labelledby="disbursement-details">
                            <form action="{{ route('admin.application.update',[$applicationCode,'disbursement-details']) }}" method="POST" id="disbursement-details-form">
                                @csrf
                                <div>
                                    <h3>
                                        <u>Disbursement Details</u>
                                        <i class="pull-right"><u>{{ $applicationCode }}</u></i>
                                    </h3>
                                </div>
                                <input type="hidden" name="formSlug" id="formSlug" value="disbursement-details">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="bank_name">Name of the Bank</label>
                                            <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $applicationData['b_bank_type'] ?? '') }}" placeholder="Name of the Bank">
                                            @if($errors->has('bank_name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('bank_name') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="vehicle_no">Vehicle No.</label>
                                            <input class="form-control {{ $errors->has('vehicle_no') ? 'is-invalid' : '' }}" type="text" name="vehicle_no" id="vehicle_no" value="{{ old('vehicle_no', $applicationData['vehicle']['registration_no'] ?? '') }}" placeholder="Vehicle No.">
                                            @if($errors->has('vehicle_no'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('vehicle_no') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="customer_mobile">Customer Mobile No.</label>
                                            <input class="form-control {{ $errors->has('customer_mobile') ? 'is-invalid' : '' }}" type="text" name="customer_mobile" id="customer_mobile" value="{{ old('customer_mobile', $applicationData->applicant_contact ?? '') }}" placeholder="Customer Mobile No.">
                                            @if($errors->has('customer_mobile'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('customer_mobile') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="customer_confirmation">Customer Confirmation</label>
                                            <select class="form-control form-select {{ $errors->has('customer_confirmation') ? 'is-invalid' : '' }}" name="customer_confirmation" id="customer_confirmation">
                                                <option value="yes" {{ old('customer_confirmation') == 'yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="no" {{ old('customer_confirmation') == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @if($errors->has('customer_confirmation'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('customer_confirmation') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="vehicle_type">Vehicle Type</label>
                                            <select class="form-control form-select {{ $errors->has('vehicle_type') ? 'is-invalid' : '' }}" name="vehicle_type" id="vehicle_type">
                                                <option value="" {{ $applicationData['vehicle']['vehicle_type'] ?? '' == '' ? 'selected' : '' }}>Select Type</option>
                                                <option value="two_wheeler" {{ $applicationData['vehicle']['vehicle_type'] ?? '' == 'two_wheeler' ? 'selected' : '' }}>Two Wheeler</option>
                                                <option value="three_wheeler" {{ $applicationData['vehicle']['vehicle_type'] ?? '' == 'three_wheeler' ? 'selected' : '' }}>Three Wheeler</option>
                                                <option value="four_wheeler" {{ $applicationData['vehicle']['vehicle_type'] ?? '' == 'four_wheeler' ? 'selected' : '' }}>Four Wheeler</option>
                                            </select>
                                            @if($errors->has('vehicle_type'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('vehicle_type') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="make">Make</label>
                                            <input class="form-control {{ $errors->has('make') ? 'is-invalid' : '' }}" type="text" name="make" id="make" value="{{ old('make', $applicationData['vehicle']['make'] ?? '') }}" placeholder="Make">
                                            @if($errors->has('make'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('make') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="model">Model</label>
                                            <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', $applicationData['vehicle']['model'] ?? '') }}" placeholder="Model">
                                            @if($errors->has('model'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('model') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="variant">Variant</label>
                                            <input class="form-control {{ $errors->has('variant') ? 'is-invalid' : '' }}" type="text" name="variant" id="variant" value="{{ old('variant', $applicationData['vehicle']['variant'] ?? '') }}" placeholder="Variant">
                                            @if($errors->has('variant'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('variant') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="year_of_manufacturing">Year of Manufacturing</label>
                                            <input class="form-control {{ $errors->has('year_of_manufacturing') ? 'is-invalid' : '' }}" type="text" name="year_of_manufacturing" id="year_of_manufacturing" value="{{ old('year_of_manufacturing', $applicationData['vehicle']['year_of_manufacturing'] ?? '') }}" placeholder="Year of Manufacturing">
                                            @if($errors->has('year_of_manufacturing'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('year_of_manufacturing') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="loan_amount">Loan Amount</label>
                                            <input class="form-control {{ $errors->has('loan_amount') ? 'is-invalid' : '' }}" type="text" name="loan_amount" id="loan_amount" value="{{ old('loan_amount', $applicationData['vehicle']['finance_amount'] ?? '') }}" placeholder="Loan Amount">
                                            @if($errors->has('loan_amount'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('loan_amount') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="loan_variation_amount">Loan Variation Amount</label>
                                            <input class="form-control {{ $errors->has('loan_variation_amount') ? 'is-invalid' : '' }}" type="text" name="loan_variation_amount" id="loan_variation_amount" value="{{ old('loan_variation_amount', '') }}" placeholder="Loan Variation Amount">
                                            @if($errors->has('loan_variation_amount'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('loan_variation_amount') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="emi_month">EMI Months</label>
                                            <select class="form-control form-select {{ $errors->has('emi_month') ? 'is-invalid' : '' }}" name="emi_month" id="emi_month">
                                                <option value="" {{ old('emi_month') == '' ? 'selected' : '' }}>Select emi_month</option>
                                                <option value="1" {{ old('emi_month') == '1' ? 'selected' : '' }}>1</option>
                                                <option value="2" {{ old('emi_month') == '2' ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ old('emi_month') == '3' ? 'selected' : '' }}>3</option>
                                                <option value="4" {{ old('emi_month') == '4' ? 'selected' : '' }}>4</option>
                                                <option value="5" {{ old('emi_month') == '5' ? 'selected' : '' }}>5</option>
                                                <option value="6" {{ old('emi_month') == '6' ? 'selected' : '' }}>6</option>
                                                <option value="7" {{ old('emi_month') == '7' ? 'selected' : '' }}>7</option>
                                                <option value="8" {{ old('emi_month') == '8' ? 'selected' : '' }}>8</option>
                                                <option value="9" {{ old('emi_month') == '9' ? 'selected' : '' }}>9</option>
                                                <option value="10" {{ old('emi_month') == '10' ? 'selected' : '' }}>10</option>
                                                <option value="11" {{ old('emi_month') == '11' ? 'selected' : '' }}>11</option>
                                                <option value="12" {{ old('emi_month') == '12' ? 'selected' : '' }}>12</option>
                                            </select>
                                            @if($errors->has('emi_month'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('emi_month') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="emi_amount">EMI Amount</label>
                                            <input class="form-control {{ $errors->has('emi_amount') ? 'is-invalid' : '' }}" type="text" name="emi_amount" id="emi_amount" value="{{ old('emi_amount', '') }}" placeholder="EMI Amount">
                                            @if($errors->has('emi_amount'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('emi_amount') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="emi_starting_date">EMI Starting Date</label>
                                            <input class="form-control {{ $errors->has('emi_starting_date') ? 'is-invalid' : '' }}" type="date" name="emi_starting_date" id="emi_starting_date" value="{{ old('emi_starting_date', '') }}" placeholder="EMI Starting Date">
                                            @if($errors->has('emi_starting_date'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('emi_starting_date') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="sms_send_option">SMS Send Option</label>
                                            <select class="form-control form-select {{ $errors->has('sms_send_option') ? 'is-invalid' : '' }}" name="sms_send_option" id="sms_send_option">
                                                <option value="yes" {{ old('sms_send_option') == 'yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="no" {{ old('sms_send_option') == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @if($errors->has('sms_send_option'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('sms_send_option') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="processing_fee">Processing Fee</label>
                                            <input class="form-control {{ $errors->has('processing_fee') ? 'is-invalid' : '' }}" type="text" name="processing_fee" id="processing_fee" value="{{ old('processing_fee', '') }}" placeholder="Processing Fee">
                                            @if($errors->has('processing_fee'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('processing_fee') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="stamp_duty">Stamp Duty</label>
                                            <input class="form-control {{ $errors->has('stamp_duty') ? 'is-invalid' : '' }}" type="text" name="stamp_duty" id="stamp_duty" value="{{ old('stamp_duty', '') }}" placeholder="EMI Amount">
                                            @if($errors->has('stamp_duty'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('stamp_duty') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="document_charge">Document Charge</label>
                                            <input class="form-control {{ $errors->has('document_charge') ? 'is-invalid' : '' }}" type="text" name="document_charge" id="document_charge" value="{{ old('document_charge', '') }}" placeholder="Document Charge">
                                            @if($errors->has('document_charge'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('document_charge') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="pdd_charge">PDD Charge</label>
                                            <input class="form-control {{ $errors->has('pdd_charge') ? 'is-invalid' : '' }}" type="text" name="pdd_charge" id="pdd_charge" value="{{ old('pdd_charge', '') }}" placeholder="PDD Charge">
                                            @if($errors->has('pdd_charge'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('pdd_charge') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="other_charge">Other Charge</label>
                                            <input class="form-control {{ $errors->has('other_charge') ? 'is-invalid' : '' }}" type="text" name="other_charge" id="other_charge" value="{{ old('other_charge', '') }}" placeholder="Other Charge">
                                            @if($errors->has('other_charge'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('other_charge') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="valuation">Valuation</label>
                                            <input class="form-control {{ $errors->has('valuation') ? 'is-invalid' : '' }}" type="text" name="valuation" id="valuation" value="{{ old('valuation', '') }}" placeholder="Valuation">
                                            @if($errors->has('valuation'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('valuation') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="insurance">Loan Suraksha (Insurance)</label>
                                            <select class="form-control form-select {{ $errors->has('insurance') ? 'is-invalid' : '' }}" name="insurance" id="insurance">
                                                <option value="yes" {{ old('insurance') == 'yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="no" {{ old('insurance') == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @if($errors->has('insurance'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('insurance') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="insurance_amount">Loan Suraksha Amount</label>
                                            <input class="form-control {{ $errors->has('insurance_amount') ? 'is-invalid' : '' }}" type="text" name="insurance_amount" id="insurance_amount" value="{{ old('insurance_amount', '') }}" placeholder="Loan Suraksha Amount">
                                            @if($errors->has('insurance_amount'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('insurance_amount') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="insurance_funding">M | Funding (Insurance)</label>
                                            <input class="form-control {{ $errors->has('insurance_funding') ? 'is-invalid' : '' }}" type="text" name="insurance_funding" id="insurance_funding" value="{{ old('insurance_funding', '') }}" placeholder="M | Funding (Insurance)">
                                            @if($errors->has('insurance_funding'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('insurance_funding') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="payment_receivable">Payment Receivable From Bank</label>
                                            <input class="form-control {{ $errors->has('payment_receivable') ? 'is-invalid' : '' }}" type="text" name="payment_receivable" id="payment_receivable" value="{{ old('payment_receivable', '') }}" placeholder="Payment Receivable From Bank">
                                            @if($errors->has('payment_receivable'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('payment_receivable') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rto_tax">RTO Tax</label>
                                            <input class="form-control {{ $errors->has('rto_tax') ? 'is-invalid' : '' }}" type="text" name="rto_tax" id="rto_tax" value="{{ old('rto_tax', '') }}" placeholder="RTO Tax">
                                            @if($errors->has('rto_tax'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rto_tax') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rto_charges">RTO Charges</label>
                                            <input class="form-control {{ $errors->has('rto_charges') ? 'is-invalid' : '' }}" type="text" name="rto_charges" id="rto_charges" value="{{ old('rto_charges', '') }}" placeholder="RTO Charges">
                                            @if($errors->has('rto_charges'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rto_charges') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="rto_paper_status">RTO Paper Status</label>
                                            <input class="form-control {{ $errors->has('rto_paper_status') ? 'is-invalid' : '' }}" type="text" name="rto_paper_status" id="rto_paper_status" value="{{ old('rto_paper_status', '') }}" placeholder="RTO Paper Status">
                                            @if($errors->has('rto_paper_status'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('rto_paper_status') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="net_payment">Net Payment</label>
                                            <input class="form-control {{ $errors->has('net_payment') ? 'is-invalid' : '' }}" type="text" name="net_payment" id="net_payment" value="{{ old('net_payment', '') }}" placeholder="Net Payment">
                                            @if($errors->has('net_payment'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('net_payment') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="payment_favour">Payment Favour Of</label>
                                            <input class="form-control {{ $errors->has('payment_favour') ? 'is-invalid' : '' }}" type="text" name="payment_favour" id="payment_favour" value="{{ old('payment_favour', '') }}" placeholder="Payment Favour Of">
                                            @if($errors->has('payment_favour'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('payment_favour') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="commision_to">Commision To</label>
                                            <input class="form-control {{ $errors->has('commision_to') ? 'is-invalid' : '' }}" type="text" name="commision_to" id="commision_to" value="{{ old('commision_to', '') }}" placeholder="Commision To">
                                            @if($errors->has('commision_to'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('commision_to') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="gst">With GST/Without GST</label>
                                            <input class="form-control {{ $errors->has('gst') ? 'is-invalid' : '' }}" type="text" name="gst" id="gst" value="{{ old('gst', '') }}" placeholder="With GST/Without GST">
                                            @if($errors->has('gst'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('gst') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    {{-- <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label class="required" for="notes">Notes</label>
                                            <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" placeholder="Notes">{{ old('notes', '') }}</textarea>
                                            @if($errors->has('notes'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('notes') }}
                                                </div>
                                            @endif
                                            <span class="help-block"></span>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>     

@endsection

@section('scripts')

    <script>

        $(document).ready(function() {
        
            $("div #other-dd").css('display','none');
            $("#b_profile_type").trigger('change');

            $("div #auto-loan").css('display','none');
            $("div #home-loan").css('display','none');
            $("#loan_type").trigger('change');

            $("div #co-applicant").css('display','none');

            if("{{ $formSlug }}") {
                var formSlug = "{{ $formSlug }}";
                var tab = "#"+formSlug+"_menu";
                $(tab).trigger('click');
            }

            VDCalculation();

        });

        $(document).on("change","#b_profile_type", function(e) {
            if($(this).val() == "self_employed") {
                $("div #other-dd").css('display','block');
            } else {
                $("div #other-dd").css('display','none');
            }
        });

        $(document).on("change","#loan_type", function(e) {
            if($(this).val() == "auto_loan") {
                $("div #auto-loan").css('display','block');
                $("div #home-loan").css('display','none');
            } else if($(this).val() == "home_loan") {
                $("div #auto-loan").css('display','none');
                $("div #home-loan").css('display','block');
            } else {
                $("div #auto-loan").css('display','none');
                $("div #home-loan").css('display','none');
            }
        });

        $("#co_applicant").click(function() {
            if($('#co_applicant').is(':checked')) { 
                $('div #co-applicant').css('display','block');
            } else {
                $('div #co-applicant').css('display','none');
            }
        });

        $(document).on('click', '.list-group-item', function (name) {
            let tabId = $(this).attr('href');
            $('#nav-tabContent .tab-pane').each(function(i, obj) {
                $(this).removeClass('show active');
            });
            
            $(tabId).addClass('show');
            $(tabId).addClass('active');     
        });

        $(document).on('input', '#valuation', function(e) {
            VDCalculation();
        });
        $(document).on('input', '#finance_amount', function(e) {
            VDCalculation();
        });

        function VDCalculation() {
            let valuation = $("#valuation").val();
            let finance_amount = $("#finance_amount").val();

            let margin = 0;
            let funding = 0;
            if(valuation && finance_amount) {
                margin = valuation - finance_amount;
                funding = finance_amount / valuation;
            }
            $("#margin").val(margin.toFixed(2));
            $("#funding").val(funding.toFixed(2));
        }


    </script>

@endsection