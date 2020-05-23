<?php

use Illuminate\Database\Seeder;

class PersonarityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personarities')->insert([
            [
                'id' => 1,
                'name' => '楽観的',
            ],
        ]);
    }
}
