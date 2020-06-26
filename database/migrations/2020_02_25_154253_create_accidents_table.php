<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccidentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accidents', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('type');
			$table->date('date');
			$table->bigInteger('driver_id')->unsigned()->index('accidents_driver_id_foreign');
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
		Schema::drop('accidents');
	}

}
