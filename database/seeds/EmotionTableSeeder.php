<?php

use Illuminate\Database\Seeder;

class EmotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emotions')->insert([
            [
                'id' => 1,
                'name' => '楽しい',
            ],
        ]);
    }
}
