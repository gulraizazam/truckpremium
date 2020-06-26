<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name');
			$table->string('address');
			$table->string('phone');
			$table->string('email');
			$table->string('planned_driving_distance');
			$table->string('planned_goods');
			$table->string('location_truck_stop');
			$table->string('purchase_type');
			$table->string('purchase_compnay_name');
			$table->string('purchase_company_address');
			$table->string('standard_coverage');
			$table->string('cargo_value');
			$table->boolean('gap_insurance');
			$table->boolean('health_insurance');
			$table->boolean('hospitalize_cash_covrage');
			$table->boolean('bussiness_liabilty');
			$table->bigInteger('truck_id')->unsigned()->index('reports_truck_id_foreign');
			$table->timestamps();
			$table->string('finance_advisor');
			$table->string('finance_advisor_emial');
			$table->string('access_token');
			$table->dateTime('token_expried_date');
			$table->bigInteger('dealer_id')->unsigned()->index('reports_dealer_id_foreign');
			$table->integer('user_id')->nullable();
			$table->dateTime('activate_at')->nullable();
			$table->boolean('client_verify')->default(0);
			$table->boolean('advisor_verify')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reports');
	}

}
