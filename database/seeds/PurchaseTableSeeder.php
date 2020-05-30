<?php

use Illuminate\Database\Seeder;

class PurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchases')->insert([
            [
                'id' => 1,
                'questionary_id' => 1,
                'candy_info' => '1-3-5-33',
                'page_info' => '1-2-34-5-4-3-2'
            ],
        ]);
    }
}
