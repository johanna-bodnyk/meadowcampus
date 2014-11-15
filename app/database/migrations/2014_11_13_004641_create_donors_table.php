<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donors', function($table) {
			$table->increments('id');
			$table->string('donor_group');
			$table->string('last_name');
			$table->string('first_name');
			$table->double('target_donation', 15, 2);
			$table->double('pledge_amount', 15, 2);
			$table->boolean('pledge_made_flag');
			$table->dateTime('pledge_date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donors');
	}

}
