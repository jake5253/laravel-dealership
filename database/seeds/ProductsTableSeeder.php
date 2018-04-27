<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Chevy Car 1',
            'description' => 'Generic Description Text',
            'mileage' => 100000,
            'price' => 3720,
            'year' => 2002,
            'color' => 'blue',
            'transmission' => 'manual',
            'fuel_type' => 'gas',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Chevy Car 2',
            'description' => 'Description Text',
            'mileage' => 112000,
            'price' => 9230,
            'year' => 2010,
            'color' => 'red',
            'transmission' => 'auto',
            'fuel_type' => 'gas',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Chevy Car 3',
            'description' => 'none',
            'mileage' => 11000,
            'price' => 12330,
            'year' => 2014,
            'color' => 'yellow',
            'transmission' => 'auto',
            'fuel_type' => 'gas',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Pontiac Car 1',
            'description' => 'none',
            'mileage' => 10000,
            'price' => 7000,
            'year' => 2007,
            'color' => 'silver',
            'transmission' => 'manual',
            'fuel_type' => 'gas',
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Dodge Truck 1',
            'description' => 'none',
            'mileage' => 80000,
            'price' => 12000,
            'year' => 2016,
            'color' => 'blue',
            'transmission' => 'auto',
            'fuel_type' => 'diesel',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Box Truck 1',
            'description' => 'none',
            'mileage' => 140000,
            'price' => 20000,
            'year' => 2013,
            'color' => 'white',
            'transmission' => 'auto',
            'fuel_type' => 'gas',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Chevy Truck 1',
            'description' => 'none',
            'mileage' => 22000,
            'price' => 18000,
            'year' => 2015,
            'color' => 'red',
            'transmission' => 'auto',
            'fuel_type' => 'gas',
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Dodge Truck 2',
            'description' => 'none',
            'mileage' => 105000,
            'price' => 29000,
            'year' => 2008,
            'color' => 'black',
            'transmission' => 'auto',
            'fuel_type' => 'gas',
            'category_id' => 2,
        ]);
    }
}
