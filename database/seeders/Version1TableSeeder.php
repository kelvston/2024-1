<?php

namespace Database\Seeders;

use Database\Seeders\CountriesTableSeeder;
use Database\Seeders\CourtCategoriesTableSeeder;
use Database\Seeders\DistrictsTableSeeder;
use Database\Seeders\JobTitlesTableSeeder;
use Database\Seeders\RegionsTableSeeder;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;



class Version1TableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(JobTitlesTableSeeder::class);
        $this->call(CourtCategoriesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);

    }
}
