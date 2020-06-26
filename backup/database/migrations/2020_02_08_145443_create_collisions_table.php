<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('territory_id');
            $table->foreign('territory_id')->references('id')->on('territorys')->onDelete('cascade');
            $table->unsignedBigInteger('group_factor_id');
            $table->foreign('group_factor_id')->references('id')->on('groups_factors')->onDelete('cascade');
            $table->double('collision_price');
            $table->unsignedBigInteger('premium_id');
            $table->foreign('premium_id')->references('id')->on('premiums')->onDelete('cascade');


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
        Schema::dropIfExists('collisions');
    }
}
