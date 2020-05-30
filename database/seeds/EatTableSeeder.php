<?php

use Illuminate\Database\Seeder;

class EatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eats')->insert([
            [
                'id' => 1,
                'name' => 'カレー'
            ],
            [
                'id' => 2,
                'name' => 'パスタ'
            ],
            [
                'id' => 3,
                'name' => '回鍋肉'
            ],[
                'id' => 4,
                'name' => '寿司'
            ],[
                'id' => 5,
                'name' => 'ラーメン'
            ],[
                'id' => 6,
                'name' => 'つけ麺'
            ],
        ]);
    }
}
