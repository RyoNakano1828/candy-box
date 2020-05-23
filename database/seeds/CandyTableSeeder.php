<?php

use Illuminate\Database\Seeder;

class CandyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candies')->insert([
            [
                'id' => 1,
                'name' => 'パイの実',
                'price' => 300,
                'weight' => 50,
                'category_id' => 1,
                'score' => 4.3
            ],
        ]);
    }
}
