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
            [
                'id' => 1,
                'review' => 'とてもおいしかったです',
                'score' => 4,
                'candy_id' => 1
            ],
        ]);
    }
}
