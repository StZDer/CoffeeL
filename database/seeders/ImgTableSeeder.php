<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 9; $i++)
            DB::table('product_images')->insert([
                'img' => 'Coffee(' . $i . ').jpg',
                'product_id' => rand(60, 86),
            ]);
    }
}
