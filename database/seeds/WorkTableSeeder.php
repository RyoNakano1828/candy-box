<?php

use Illuminate\Database\Seeder;

class WorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            [
                'id' => 1,
                'name' => 'IT'
            ],
            [
                'id' => 2,
                'name' => '教育'
            ],
            [
                'id' => 3,
                'name' => '事務'
            ],
            [
                'id' => 4,
                'name' => '警察'
            ],
            [
                'id' => 5,
                'name' => '学生'
            ],
            [
                'id' => 6,
                'name' => 'アパレル'
            ],
        ]);
    }
}
