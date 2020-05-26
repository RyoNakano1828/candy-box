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
            [
                'id' => 2,
                'name' => '悲しい'
            ],
            [
                'id' => 3,
                'name' => '面白い'
            ],
            [
                'id' => 4,
                'name' => '驚き'
            ],
            [
                'id' => 5,
                'name' => 'うれしい'
            ],
            [
                'id' => 6,
                'name' => 'やさしい'
            ],
        ]);
    }
}
