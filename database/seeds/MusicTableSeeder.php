<?php

use Illuminate\Database\Seeder;

class MusicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('musics')->insert([
            [
                'id' => 1,
                'name' => '関ジャニ∞',
            ],
            [
                'id' => 2,
                'name' => '嵐'
            ],
            [
                'id' => 3,
                'name' => 'TOKIO'
            ],
            [
                'id' => 4,
                'name' => 'V6'
            ],
            [
                'id' => 5,
                'name' => '乃木坂'
            ],
            [
                'id' => 6,
                'name' => 'ゲスの極み乙女'
            ],
        ]);
    }
}
