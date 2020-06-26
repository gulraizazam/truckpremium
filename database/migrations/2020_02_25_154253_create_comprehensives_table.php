<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComprehensivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comprehensives', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('territory_id')->unsigned()->index('comprehensives_territory_id_foreign');
			$table->bigInteger('group_factor_id')->unsigned()->index('comprehensives_group_factor_id_foreign');
			$table->float('comprehensive_price', 10, 0);
			$table->bigInteger('premium_id')->unsigned()->index('comprehensives_premium_id_foreign');
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
		Schema::drop('comprehensives');
	}

}
