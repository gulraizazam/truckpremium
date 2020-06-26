<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupsFactorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups_factors', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->date('year_start');
			$table->date('year_end');
			$table->bigInteger('car_rate_group_id')->unsigned()->index('groups_factors_car_rate_group_id_foreign');
			$table->integer('group');
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
		Schema::drop('groups_factors');
	}

}
