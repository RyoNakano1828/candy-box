<?php

use Illuminate\Database\Seeder;

class PersonalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personalities')->insert([
            [
                'id' => 1,
                'name' => '楽観的',
            ],
            [
                'id' => 2,
                'name' => '悲観的'
            ],
            [
                'id' => 3,
                'name' => '明るい'
            ],
            [
                'id' => 4,
                'name' => '静か'
            ],
            [
                'id' => 5,
                'name' => 'よくしゃべる'
            ],
            [
                'id' => 6,
                'name' => 'スマート'
            ],
        ]);
    }
}
