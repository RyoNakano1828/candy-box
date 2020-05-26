<?php

use Illuminate\Database\Seeder;

class HobbyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobbies')->insert([
            [
                'id' => 1,
                'name' => '読書',
            ],
            [
                'id' => 2,
                'name' => '漫画'
            ],
            [
                'id' => 3,
                'name' => 'スポーツ'
            ],
            [
                'id' => 4,
                'name' => 'ゲーム'
            ],
            [
                'id' => 5,
                'name' => '楽器'
            ],
            [
                'id' => 6,
                'name' => 'アニメ'
            ],
        ]);
    }
}
