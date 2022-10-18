<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('application_code')->nullable();
            $table->date('system_date')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('team_id')->unsigned();
            $table->integer('branch_id')->unsigned();

            //source
            $table->enum('source_type',['telecaller','broker','direct','refferal'])->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_email')->nullable();
            $table->string('source_gst_no')->nullable();
            $table->string('source_contact')->nullable();

            //business details
            $table->string('b_bank_type')->nullable();
            $table->enum('b_profile_type',['self_employed','salaried'])->nullable();
            $table->enum('b_other_dd_type',['proprietor','partner','director','agriculture','others'])->nullable();
            $table->string('b_company_name')->nullable();
            $table->enum('b_company_type',['private_limited','limited','llp'])->nullable();

            //person details
            $table->string('applicant_name')->nullable();
            $table->enum('applicant_designation_type',['proprietor','partner','director','agriculture','others'])->nullable();
            $table->string('applicant_contact_person')->nullable();
            $table->string('applicant_contact')->nullable();
            $table->string('applicant_other_contact')->nullable();
            $table->string('applicant_email')->nullable();
            $table->date('applicant_dob')->nullable();

            //resident details
            $table->enum('resident_type',['owned','rented'])->nullable();
            $table->string('rc_address')->nullable();
            $table->string('rc_area')->nullable();
            $table->string('rc_city')->nullable();
            $table->string('rc_state')->nullable();
            $table->string('rp_address')->nullable();
            $table->string('rp_area')->nullable();
            $table->string('rp_city')->nullable();
            $table->string('rp_state')->nullable();

            //office details
            $table->string('o_company_name')->nullable();
            $table->string('o_address')->nullable();
            $table->string('o_area')->nullable();
            $table->string('o_city')->nullable();
            $table->string('o_state')->nullable();
            $table->string('o_landmark')->nullable();
            $table->string('o_pincode')->nullable();

            //product
            $table->enum('loan_type',['auto_loan','commercial_vehicle','home_loan','personal_loan','business_loan','gold_loan'])->nullable();
            $table->enum('autoloan_type',['new','used','refinance','purchased','bt','bt_topup'])->nullable();
            $table->enum('homeloan_type',['lap','bt_topup','hl'])->nullable();
            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            // $table->softDeletes('deleted_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
