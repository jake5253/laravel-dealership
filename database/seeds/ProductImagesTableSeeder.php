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
            'image' => 'example/camero1.jpg',
            'thumbnail' => 'example/thm_camero1.jpg',
            'default' => 1,
        ]);

        DB::table('product_images')->insert([
            'product_id' => 2,
            'image' => 'example/camero2.jpg',
            'thumbnail' => 'example/thm_camero2.jpg',
            'default' => 1,
        ]);

        DB::table('product_images')->insert([
            'product_id' => 3,
            'image' => 'example/corvette1.jpg',
            'thumbnail' => 'example/thm_corvette1.jpg',
            'default' => 1,
        ]);

        DB::table('product_images')->insert([
            'product_id' => 4,
            'image' => 'example/solstace1.jpg',
            'thumbnail' => 'example/thm_solstace1.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 5,
            'image' => 'example/dodge1.jpg',
            'thumbnail' => 'example/thm_dodge1.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 6,
            'image' => 'example/box1.jpg',
            'thumbnail' => 'example/thm_box1.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 7,
            'image' => 'example/ssr1.jpg',
            'thumbnail' => 'example/thm_ssr1.jpg',
            'default' => 1,
        ]);
        DB::table('product_images')->insert([
            'product_id' => 7,
            'image' => 'example/ssr1.1.jpg',
            'thumbnail' => 'example/thm_ssr1.1.jpg',
        ]);
        DB::table('product_images')->insert([
            'product_id' => 7,
            'image' => 'example/ssr1.2.jpg',
            'thumbnail' => 'example/thm_ssr1.2.jpg',
        ]);

         DB::table('product_images')->insert([
            'product_id' => 8,
            'image' => 'example/dodge2.jpg',
            'thumbnail' => 'example/thm_dodge2.jpg',
            'default' => 1,
        ]);

    }
}
