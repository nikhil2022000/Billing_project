<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_data', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('number');
            $table->string('assigned_to');
            $table->string('service_type');
            $table->string('relationship_no');
            $table->string('pyment_units');
            $table->string('pyment_mode');
            $table->string('plan_details');
            $table->string('operator');
            $table->string('bill_date');
            $table->string('billing_cycle_from');
            $table->string('billing_cycle_to');
            $table->string('grace_days');
            $table->string('due_date');
            $table->string('billing_type');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('security_deposit');
            $table->string('custmoer_gst_no');
            $table->string('biller_gst_number');
            $table->string('state');
            $table->string('branch_location');
            $table->string('monthly_cr_limit');
            $table->string('get_billing_details_from');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_data');
    }
}
