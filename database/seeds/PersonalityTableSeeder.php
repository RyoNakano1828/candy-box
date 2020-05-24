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
        ]);
    }
}
