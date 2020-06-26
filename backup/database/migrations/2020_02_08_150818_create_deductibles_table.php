<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deductibles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->double('coll');
            $table->double('comp');
            $table->double('sp');
            $table->double('lia');
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
        Schema::dropIfExists('deductibles');
    }
}
