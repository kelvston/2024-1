<?php

namespace Database\Seeders;


//use Database\Seeders\Version1\DocumentIncidentsTableSeeder;
use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        Model::unguard();

        $this->call(Version1TableSeeder::class);

    }

}
