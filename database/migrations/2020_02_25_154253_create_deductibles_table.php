<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeductiblesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deductibles', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('report_id');
			$table->float('amount', 10, 0);
			$table->float('coll', 10, 0);
			$table->float('comp', 10, 0);
			$table->float('sp', 10, 0)->nullable();
			$table->float('lia', 10, 0);
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
		Schema::drop('deductibles');
	}

}
