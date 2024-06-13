<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWfTracksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wf_tracks', function(Blueprint $table)
		{
			$table->foreign('wf_type_id', 'wf_tracks_ibfk_1')->references('id')->on('wf_types')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('wf_module_id', 'wf_tracks_ibfk_2')->references('id')->on('wf_modules')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('parent_id', 'wf_tracks_ibfk_3')->references('id')->on('wf_tracks')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wf_tracks', function(Blueprint $table)
		{
			$table->dropForeign('wf_tracks_ibfk_1');
			$table->dropForeign('wf_tracks_ibfk_2');
			$table->dropForeign('wf_tracks_ibfk_3');
		});
	}

}
