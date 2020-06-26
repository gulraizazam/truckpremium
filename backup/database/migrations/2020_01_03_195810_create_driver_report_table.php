<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->unsignedBigInteger('report_id');
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
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
        Schema::dropIfExists('driver_report');
    }
}
