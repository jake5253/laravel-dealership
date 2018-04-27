<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            'owner_name' => 'John Smith',
            'shop_name' => 'Generic Dealership, Inc.',
            'description' => 'We sell cars!',
            'hours' => 'Mon - Fri - 9a-5p or by appointment!',
            'phone' => '(888)888-1234',
            'address' => '123 Main St. | Anytown, NE 87654',
            'gmap' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3060904.5294744833!2d-101.92363562267383!3d41.479031537743815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87938dc8b50cfced%3A0xa127900c0ff30ac4!2sNebraska!5e0!3m2!1sen!2sus!4v1524798481382',
            'email' => 'anyemail@site.biz',
            'fax' => '(888)888-4321',
        ]);
    }
}
