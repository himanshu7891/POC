<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisbursementDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disbursement_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id')->unsigned();
            $table->string('bank_name')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->enum('customer_confirmation',['yes','no'])->nullable();
            $table->enum('vehicle_type',['two_wheeler','three_wheeler','four_wheeler'])->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('variant')->nullable();
            $table->string('year_of_manufacturing')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('loan_variation_amount')->nullable();
            $table->enum('emi_month',['1','2','3','4','5','6','7','8','9','10','11','12'])->nullable();
            $table->string('emi_amount')->nullable();
            $table->date('emi_starting_date')->nullable();
            $table->enum('sms_send_option',['yes','no'])->nullable();
            $table->string('processing_fee')->nullable();
            $table->string('stamp_duty')->nullable();
            $table->string('document_charge')->nullable();
            $table->string('pdd_charge')->nullable();
            $table->string('other_charge')->nullable();
            $table->string('valuation')->nullable();
            $table->enum('insurance',['yes','no'])->nullable();
            $table->string('insurance_amount')->nullable();
            $table->string('insurance_funding')->nullable();
            $table->string('payment_receivable')->nullable();
            $table->string('rto_tax')->nullable();
            $table->string('rto_charges')->nullable();
            $table->string('rto_paper_status')->nullable();
            $table->string('net_payment')->nullable();
            $table->string('payment_favour')->nullable();
            $table->string('commision_to')->nullable();
            $table->string('gst')->nullable();
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
        Schema::dropIfExists('disbursement_details');
    }
}
