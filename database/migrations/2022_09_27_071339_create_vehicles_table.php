<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id')->unsigned();

            //vehicle details
            $table->string('make')->nullable();
            $table->enum('vehicle_type',['two_wheeler','three_wheeler','four_wheeler'])->nullable();
            $table->string('model')->nullable();
            $table->string('variant')->nullable();
            $table->string('year_of_manufacturing')->nullable();
            $table->double('valuation',10,2)->nullable();
            $table->double('finance_amount',10,2)->nullable();
            $table->double('margin',10,2)->nullable();
            $table->string('funding')->nullable();
            $table->string('scheme_applied')->nullable();
            $table->enum('months',['1','2','3','4','5','6','7','8','9','10','11','12'])->nullable();
            $table->double('emi_amount',10,2)->nullable();
            $table->string('customer_irr')->nullable();

            //vehicle registration details
            $table->string('registration_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('chasis_no')->nullable();
            $table->string('insurance_company_name')->nullable();
            $table->string('idv')->nullable();
            $table->string('policy_no')->nullable();
            $table->date('insurance_policy_start_date')->nullable();

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
        Schema::dropIfExists('vehicles');
    }
}
