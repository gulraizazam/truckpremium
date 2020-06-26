<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassFactorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('class_factors', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('radius');
			$table->integer('min_radius');
			$table->integer('max_radius');
			$table->integer('class');
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
		Schema::drop('class_factors');
	}

}
