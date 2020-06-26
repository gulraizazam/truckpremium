<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drivers', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('Name');
			$table->string('license_number');
			$table->string('driver_license_class');
			$table->date('date_of_birth');
			$table->bigInteger('truck_id')->unsigned()->index('drivers_truck_id_foreign');
			$table->bigInteger('report_id')->unsigned()->index('drivers_report_id_foreign');
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
		Schema::drop('drivers');
	}

}
