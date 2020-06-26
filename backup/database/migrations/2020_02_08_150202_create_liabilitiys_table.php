<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiabilitiysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liabilitiys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('territory_id');
            $table->foreign('territory_id')->references('id')->on('territorys')->onDelete('cascade');
            $table->unsignedBigInteger('class_factor_id');
            $table->foreign('class_factor_id')->references('id')->on('class_factors')->onDelete('cascade');
            $table->unsignedBigInteger('premium_id');
            $table->foreign('premium_id')->references('id')->on('premiums')->onDelete('cascade');
            $table->boolean('is_danger');
            $table->double('liability_price');
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
        Schema::dropIfExists('liabilitiys');
    }
}
