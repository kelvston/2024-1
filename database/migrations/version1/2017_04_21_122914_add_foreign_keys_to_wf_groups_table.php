<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWfGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wf_groups', function(Blueprint $table)
		{
			$table->foreign('wf_module_id', 'wf_groups_ibfk_1')->references('id')->on('wf_modules')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wf_groups', function(Blueprint $table)
		{
			$table->dropForeign('wf_groups_ibfk_1');
		});
	}

}
