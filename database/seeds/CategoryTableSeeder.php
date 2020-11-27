<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'category_name'=> "Shounen(Boy's Figurine)"
            ],
            [
                'category_name'=> "Bishoujo(Girl's Figurine)"
            ],
            [
                'category_name' =>'Character'
            ],
            [
                'category_name' =>'Naruto'
            ]
        ]);
    }
}
