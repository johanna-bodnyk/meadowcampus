<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorLevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donor_levels', function($table) {
			$table->increments('id');
			$table->string('donor_level_label');
			$table->double('minimum_amount', 15, 2);
			$table->double('maximum_amount', 15, 2);
			$table->double('target_amount', 15, 2);
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donor_levels');
	}
}
