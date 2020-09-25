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
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'チョコレート',
            ],
            [
                'id' => 2,
                'name' => 'スナック菓子',
            ],
            [
                'id' => 4,
                'name' => 'キャンディー・ガム・キャラメル',
            ],
            [
                'id' => 5,
                'name' => 'クッキー・ビスケット',
            ],
            [
                'id' => 3,
                'name' => '豆・ナッツ',
            ],
            [
                'id' => 6,
                'name' => 'フルーツ',
            ],
            [
                'id' => 7,
                'name' => 'おつまみ',
            ],
            [
                'id' => 8,
                'name' => '和菓子',
            ],
            [
                'id' => 9,
                'name' => '洋菓子',
            ],
        ]);
    }
}
