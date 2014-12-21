<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInauguralAndDisplayToDonors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('donors', function($table) {
            $table->boolean('inaugural');
            $table->string('display_name');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('donors', function($table) {
            $table->dropColumn('inaugural');
            $table->dropColumn('display_name');
        });
	}

}
