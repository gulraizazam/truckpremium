<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('refered_by');
            $table->string('planned_driving_distance');
            $table->string('planned_goods');
            $table->string('location_truck_stop');
            $table->string('purchase_type');
            $table->string('purchase_compnay_name');
            $table->string('purchase_company_address');
            $table->string('standard_coverage');
            $table->string('cargo_value');
            $table->boolean('gap_insurance');
            $table->boolean('health_insurance');
            $table->boolean('hospitalize_cash_covrage');
            $table->boolean('bussiness_liabilty');
            $table->string('liability');
            $table->string('collision');
            $table->string('comprehensive');
            $table->string('accident_benefit');
            $table->unsignedBigInteger('truck_id');
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
