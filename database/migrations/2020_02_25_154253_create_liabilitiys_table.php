<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLiabilitiysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liabilitiys', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('territory_id')->unsigned()->index('liabilitiys_territory_id_foreign');
			$table->bigInteger('class_factor_id')->unsigned()->index('liabilitiys_class_factor_id_foreign');
			$table->bigInteger('premium_id')->unsigned()->index('liabilitiys_premium_id_foreign');
			$table->boolean('is_danger');
			$table->float('liability_price', 10, 0);
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
		Schema::drop('liabilitiys');
	}

}
