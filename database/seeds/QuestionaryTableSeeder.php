<?php

use Illuminate\Database\Seeder;

class QuestionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questionaries')->insert([
            [
                'id' => 1,
                'gender' => 1,
                'age' => 30,
                'height' => 160,
                'weight' => 50,
                'emotion_info' =>  '1-3-5-7',
                'personality_info' => '1-2-3-6',
                'hobby_info' =>  '1-3-4-7',
                'eat_info' =>  '1-3-5-9',
                'music_info' =>  '5-7',
                'work_info' =>  '1-7',
            ],
        ]);
    }
}
