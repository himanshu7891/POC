<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'application_code',
        'system_date',
        'user_id',
        'team_id',
        'branch_id',
        'source_type',
        'source_name',
        'source_email',
        'source_gst_no',
        'source_contact',
        'b_bank_type',
        'b_profile_type',
        'b_other_dd_type',
        'b_company_name',
        'b_company_type',
        'applicant_name',
        'applicant_designation_type',
        'applicant_contact_person',
        'applicant_contact',
        'applicant_other_contact',
        'applicant_email',
        'applicant_dob',
        'resident_type',
        'rc_address',
        'rc_area',
        'rc_city',
        'rc_state',
        'rp_address',
        'rp_area',
        'rp_city',
        'rp_state',
        'o_company_name',
        'o_address',
        'o_area',
        'o_city',
        'o_state',
        'o_landmark',
        'o_pincode',
        'loan_type',
        'autoloan_type',
        'homeloan_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function team() {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
    public function branch() {
        return $this->belongsTo(Team::class, 'branch_id', 'id');
    }
    public function applicationStatus() {
        return $this->hasOne(ApplicationStatus::class, 'application_id', 'id');
    }
    public function references() {
        return $this->hasMany(References::class, 'application_id', 'id');
    }
    public function coapplicants() {
        return $this->hasMany(CoApplicantDetails::class, 'application_id', 'id');
    }
    public function vehicle() {
        return $this->hasOne(Vehicles::class, 'application_id', 'id');
    }

}
