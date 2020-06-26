<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrucksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trucks', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('truck_made_year');
			$table->string('truck_brand_name');
			$table->string('truck_model');
			$table->string('cost_purchase');
			$table->date('date_of_purchase');
			$table->date('truck_effective_date');
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
		Schema::drop('trucks');
	}

}
