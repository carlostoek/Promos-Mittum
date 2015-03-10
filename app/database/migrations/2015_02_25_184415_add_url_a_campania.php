<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlACampania extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('campanias', function($table)
			{
			    $table->string('url_ok');
			    $table->string('url_fail');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('campanias', function($table)
{
     $table->dropColumn(array('url_ok', 'url_fail'));
});
	}

}
