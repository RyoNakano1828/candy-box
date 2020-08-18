<?php

use Illuminate\Database\Seeder;

class KeywordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keywords')->insert([
            [
                'id' => 1,
                'name' => 'プロテイン入り',
            ],
            [
                'id' => 2,
                'name' => 'いいわけおやつシリーズ',
            ],
            [
                'id' => 3,
                'name' => 'オーガニック商品',
            ],
            [
                'id' => 4,
                'name' => 'アーモンド',
            ],
            [
                'id' => 5,
                'name' => 'ビーフジャーキー',
            ],
            [
                'id' => 6,
                'name' => 'ゼリー',
            ],
            [
                'id' => 7,
                'name' => '北海道',
            ],
            [
                'id' => 8,
                'name' => 'おつまみ',
            ],
            [
                'id' => 9,
                'name' => 'チーズ',
            ],
            [
                'id' => 10,
                'name' => 'ひとときスイーツ',
            ],
            [
                'id' => 11,
                'name' => 'いか',
            ],
            [
                'id' => 12,
                'name' => 'ディズニー',
            ],
            [
                'id' => 13,
                'name' => 'ナッツ',
            ],
            [
                'id' => 14,
                'name' => 'ミックス',
            ],
            [
                'id' => 15,
                'name' => 'かすてら',
            ],
            [
                'id' => 16,
                'name' => 'FreeFromシリーズ',
            ],
            [
                'id' => 17,
                'name' => '栗',
            ],
            [
                'id' => 18,
                'name' => 'ポテトチップス',
            ],
            [
                'id' => 19,
                'name' => 'ミント',
            ],
            [
                'id' => 20,
                'name' => 'お菓子作り',
            ],
            [
                'id' => 21,
                'name' => 'フルーツ',
            ],
            [
                'id' => 22,
                'name' => 'ケーキ',
            ],
            [
                'id' => 23,
                'name' => 'その他',
            ],
        ]);
    }
}
