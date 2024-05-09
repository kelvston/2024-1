<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\TruncateTable;
use Database\DisableForeignKeys;

class CourtCategoriesTableSeeder extends Seeder
{

//    use DisableForeignKeys, TruncateTable;

    public function run()
    {
//        $this->disableForeignKeys('court_categories');
//        $this->delete('court_categories');

        \DB::table('court_categories')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'District Magistrate',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Resident Magistrate',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'High Court',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Court of Appeal',
                ),
        ));

//        $this->enableForeignKeys('court_categories');
    }

}
