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
            [
                'product_name' => 'Gundam HG',
                'id_category' => 1,
                'product_desc' => 'WTS GUNPLA Barang mantul,masih di segel
                Tanyakan terlebih dahulu',
                'product_quantity' => 20,
                'product_price' => 100000,
                'product_image' => 'hg1.jpg'
            ],
            [
                'product_name' => 'Gundam MG',
                'id_category' => 1,
                'product_desc' => 'GUNPLA Gundam MG 
                Barang mantul,masih di segel
                Tanyakan terlebih dahulu',
                'product_quantity' => 10,
                'product_price' => 250000,
                'product_image' => 'mg2.jpg'
            ],
            [
                'product_name' => 'Funky Pop Iron Man',
                'id_category' => 3,
                'product_desc' => 'Funky Pop IronMan 
                Barang mantul,masih di segel
                Tanyakan terlebih dahulu',
                'product_quantity' => 50,
                'product_price' => 1000000,
                'product_image' => 'funkopop1.jpg'
            ],
            [
                'product_name' => 'Funky Pop Captain America',
                'id_category' => 3,
                'product_desc' => 'Funky Pop Captain America
                Barang mantul,masih di segel
                Tanyakan terlebih dahulu',
                'product_quantity' => 34,
                'product_price' => 1000000,
                'product_image' => 'funkopop2.jpg'
            ],
            [
                'product_name' => 'Gundam HG 00',
                'id_category' => 1,
                'product_desc' => 'WTS GUNPLA 
                Barang mantul,masih di segel
                Tanyakan terlebih dahulu',
                'product_quantity' => 34,
                'product_price' => 100000,
                'product_image' => 'hg2.jpg'
            ],
            [
                'product_name' => 'Gundam MG AileStrike',
                'id_category' => 1,
                'product_desc' => 'WTS GUNPLA 
                Barang mantul,masih di segel
                Tanyakan terlebih dahulu',
                'product_quantity' => 25,
                'product_price' => 100000,
                'product_image' => 'mg2.jpg'
            ]
        ]);
    }
}
