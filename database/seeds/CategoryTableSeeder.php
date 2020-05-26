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
                'id' => 3,
                'name' => 'クッキー・ビスケット',
            ],
            [
                'id' => 4,
                'name' => 'キャンディー・ガム・タブレット',
            ],
            [
                'id' => 5,
                'name' => 'おせんべい',
            ],
            [
                'id' => 6,
                'name' => '豆菓子・ナッツ・ドライフルーツ',
            ],
            [
                'id' => 7,
                'name' => 'おつまみ・珍味',
            ],
            [
                'id' => 8,
                'name' => '和菓子',
            ],
            [
                'id' => 9,
                'name' => '洋菓子',
            ],
            [
                'id' => 10,
                'name' => 'その他',
            ],
        ]);
    }
}
