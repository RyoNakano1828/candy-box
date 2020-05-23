<?php

use Illuminate\Database\Seeder;

class EatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eats')->insert([
            [
                'id' => 1,
                'name' => 'カレー'
            ],
        ]);
    }
}
