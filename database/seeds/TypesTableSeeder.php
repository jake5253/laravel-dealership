<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Trucks',
        ]);
        DB::table('types')->insert([
            'name' => 'Cars',
        ]);
        DB::table('types')->insert([
            'name' => 'Others',
        ]);
    }

}
