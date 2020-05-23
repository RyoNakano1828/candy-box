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
        ]);
    }
}
