<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donor_groups', function($table) {
			$table->increments('id');
			$table->string('donor_group_name');
			$table->double('target_amount', 15, 2);
			$table->double('estimate_percent', 15, 8);
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donor_groups');
	}

}
