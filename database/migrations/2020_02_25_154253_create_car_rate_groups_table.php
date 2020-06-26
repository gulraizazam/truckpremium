<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarRateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('car_rate_groups', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('car_pricing_rating');
			$table->string('notes');
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
		Schema::drop('car_rate_groups');
	}

}
