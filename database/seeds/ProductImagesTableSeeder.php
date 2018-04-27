<?php

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            'product_id' => 1,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
            'default' => 1,
        ]);

        DB::table('product_images')->insert([
            'product_id' => 2,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
            'default' => 1,
        ]);

        DB::table('product_images')->insert([
            'product_id' => 3,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 3,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => 4,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 5,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 6,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/default.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 7,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 7,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
        ]);
        DB::table('product_images')->insert([
            'product_id' => 8,
            'image' => 'example/default.jpg',
            'thumbnail' => 'example/thm_default.jpg',
            'default' => 1,
        ]);

    }
}
