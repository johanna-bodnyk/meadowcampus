<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('types', function($table) {
			$table->increments('id');
			$table->string('type');
		});

		Schema::create('donor_type', function($table) {
			$table->integer('donor_id')->unsigned();
			$table->integer('type_id')->unsigned();
			$table->foreign('donor_id')->references('id')->on('donors');
			$table->foreign('type_id')->references('id')->on('types');
		});

		// Did not work -- did manually instead
		// Schema::table('donors', function($table) {
		// 	$table->dropColumn(array('student, alum, parent, alum_parent, staff, alum_staff'));
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('donor_type', function($table) {
			$table->dropForeign('donor_type_donor_id_foreign');
			$table->dropForeign('donor_type_type_id_foreign');
		});

		Schema::drop('donor_type');
		Schema::drop('types');

		Schema::table('donors', function($table) {
			$table->boolean('student');
			$table->boolean('alum');
			$table->boolean('parent');
			$table->boolean('alum_parent');
			$table->boolean('staff');
			$table->boolean('alum_staff');
		});

	}

}
