<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDealearsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dealears', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name');
			$table->integer('phone');
			$table->string('adress');
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
		Schema::drop('dealears');
	}

}
