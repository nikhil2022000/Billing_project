<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyBillingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_billing_data', function (Blueprint $table) {
            $table->id();
            $table->string('billable_id');
            $table->string('operator');
            $table->string('operator_type');
            $table->string('number_of_connection');
            $table->string('payment_unit');
            $table->string('monthly_rental');
            $table->string('usages');
            $table->string('gst');
            $table->string('tds');
            $table->string('invoice_number');
            $table->string('bill_date');
            $table->string('due_date');
            $table->string('hardcopy_invoice');
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
        Schema::dropIfExists('monthly_billing_data');
    }
}
