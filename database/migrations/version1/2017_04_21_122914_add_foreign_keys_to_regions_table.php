<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('regions', function(Blueprint $table)
		{
			$table->foreign('country_id', 'regions_ibfk_1')->references('id')->on('countries')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('regions', function(Blueprint $table)
		{
			$table->dropForeign('regions_ibfk_1');
		});
	}

}
