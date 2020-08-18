<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoryTableSeeder::class,
            QuestionaryTableSeeder::class,
            CandyTableSeeder::class,
            ReviewTableSeeder::class,
            PurchaseTableSeeder::class,
            KeywordTableSeeder::class,
        ]);
    }
}
