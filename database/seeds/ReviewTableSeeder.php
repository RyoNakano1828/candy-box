<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            // [
            //     'id' => 1,
            //     'review' => 'とてもおいしかったです',
            //     'score' => 4,
            //     'candy_id' => 1
            // ],
            // [
            //     'id' => 2,
            //     'review' => 'とてもおいしかったです2',
            //     'score' => 4,
            //     'candy_id' => 1
            // ],
            // [
            //     'id' => 3,
            //     'review' => 'うまし',
            //     'score' => 4,
            //     'candy_id' => 2
            // ],
            // [
            //     'id' => 4,
            //     'review' => '渋み',
            //     'score' => 4,
            //     'candy_id' => 3
            // ],
            // [
            //     'id' => 5,
            //     'review' => 'とてもまずかったです',
            //     'score' => 2,
            //     'candy_id' => 5
            // ],
        ]);
    }
}
