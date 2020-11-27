<?php

use Illuminate\Database\Seeder;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('feedbacks')->insert([
            [
                'id_user' => 2,
                'textfeedback' => 'Kurang banyak stok barang',
                'feedvalidate' => 'none'
            ],
            [
                'id_user' => 3,
                'textfeedback' => 'Packingnya kurang bagus',
                'feedvalidate' => 'none'
            ],
            [
                'id_user' => 2,
                'textfeedback' => 'Pengiriman lama',
                'feedvalidate' => 'none'
            ]
        ]);
    }
}
