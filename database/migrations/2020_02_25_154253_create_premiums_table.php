<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePremiumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('premiums', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->date('effect_date')->nullable();
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
		Schema::drop('premiums');
	}

}
