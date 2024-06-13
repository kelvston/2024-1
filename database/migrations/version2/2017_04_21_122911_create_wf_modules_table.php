<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWfModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wf_modules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('wf_module_group_id')->unsigned()->index('wf_module_group_id');
			$table->decimal('min_approval_limit_amount', 14)->nullable();
			$table->decimal('max_approval_limit_amount', 14)->nullable();
			$table->timestamps();
			$table->softDeletes();
//			$table->unique(['name','wf_module_group_id'], 'name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wf_modules');
	}

}
