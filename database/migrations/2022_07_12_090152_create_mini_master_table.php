<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_master', function (Blueprint $table) {
            $table->id();
            $table->string('sr_no');
            $table->string('operator');
            $table->string('assigned_to');
            $table->string('number');
            $table->string('plan_details');
            $table->string('branch_locaiton');
            $table->string('status');

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
        Schema::dropIfExists('mini_master');
    }
}
