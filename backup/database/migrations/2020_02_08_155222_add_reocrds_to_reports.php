<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReocrdsToReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('finance_advisor');
            $table->string('finance_advisor_emial');
            $table->string('access_token');
            $table->dateTime('token_expried_date');
            $table->unsignedBigInteger('dealer_id');
            $table->foreign('dealer_id')->references('id')->on('dealears')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('refered_by');
            $table->dropColumn('liability');
            $table->dropColumn('collision');
            $table->dropColumn('comprehensive');
            $table->dropColumn('accident_benefit');
        });
    }
}
