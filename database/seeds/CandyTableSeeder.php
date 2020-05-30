<?php

use Illuminate\Database\Seeder;

class CandyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candies')->insert([
            [
                'id' => 1,
                'name' => '北海道産牛乳使用プチカップケーキ',
                'price' => 300,
                'weight' => "50g",
                'category_id' => 1,
                'score' => 4.3
            ],
            [
                'id' => 2,
                'name' => '甘辛するめいか',
                'price' => 200,
                'weight' => "30g",
                'category_id' => 2,
                'score' => 4.0
            ],[
                'id' => 3,
                'name' => '皮付きさきいか',
                'price' => 400,
                'weight' => "5個",
                'category_id' => 2,
                'score' => 4.0
            ],[
                'id' => 4,
                'name' => '焼きえいひれ',
                'price' => 300,
                'weight' => "5個",
                'category_id' => 3,
                'score' => 0
            ],[
                'id' => 5,
                'name' => 'ポテトチップスコンソメ',
                'price' => 300,
                'weight' => '50g',
                'category_id' => 4,
                'score' => 1.3
            ],[
                'id' => 6,
                'name' => 'ポテトチップス塩',
                'price' => 300,
                'weight' => '50g',
                'category_id' => 4,
                'score' => 2.3
            ],[
                'id' => 7,
                'name' => 'ポテトチップスのり塩',
                'price' => 300,
                'weight' => '50g',
                'category_id' => 4,
                'score' => 3.3
            ],[
                'id' => 8,
                'name' => '厚切りポテトチップス',
                'price' => 300,
                'weight' => '500g',
                'category_id' => 4,
                'score' => 4.3
            ],
        ]);
    }
}
