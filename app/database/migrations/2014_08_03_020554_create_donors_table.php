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
			$table->timestamps();
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('amount');
			$table->boolean('student');
			$table->boolean('alum');
			$table->boolean('parent');
			$table->boolean('alum_parent');
			$table->boolean('staff');
			$table->boolean('alum_staff');
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
