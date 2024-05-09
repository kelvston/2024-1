<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedAtToRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->smallInteger('office_zone_id')->nullable();
            $table->softDeletes();
        });

    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//
    }
}
