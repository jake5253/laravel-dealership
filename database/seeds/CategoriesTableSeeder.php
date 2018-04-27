<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        'name' => 'Chevy',
        'type_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'Dodge',
            'type_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'Chevy',
            'type_id' => 2,
        ]);
        DB::table('categories')->insert([
            'name' => 'Box Trucks',
            'type_id' => 3,
        ]);
        DB::table('categories')->insert([
            'name' => 'Pontiac',
            'type_id' => 2,
        ]);
    }
}
