<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 30; $i++)
            DB::table('products')->insert([
                'title' => 'Products ' . $i,
                'price' => rand(30, 999),
                'in_stock' => '1',
                'category_id' => rand(1, 3),
                'composition1' => '13% белков',
                'composition2' => '13% жиров',
                'composition3' => '35% нерастительных жиров',
                'composition4' => '25% углеводов',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non nisi id nulla vestibulum porttitor. Nullam euismod mauris at malesuada pulvinar. Quisque sit amet mi felis. Curabitur scelerisque laoreet velit eget bibendum. Ut fringilla arcu vestibulum congue vestibulum. Suspendisse bibendum at turpis sed convallis. Morbi volutpat porttitor ante ac volutpat.',
            ]);
    }
}
