<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_factors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('year_start');
            $table->dateTime('year_end');
            $table->unsignedBigInteger('car_rate_group_id');
            $table->foreign('car_rate_group_id')->references('id')->on('car_rate_groups')->onDelete('cascade');
            $table->integer('group');
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
        Schema::dropIfExists('groups_factors');
    }
}
