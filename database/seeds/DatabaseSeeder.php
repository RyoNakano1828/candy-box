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
            CandyTableSeeder::class,
            CategoryTableSeeder::class,
            EatTableSeeder::class,
            EmotionTableSeeder::class,
            HobbyTableSeeder::class,
            PersonarityTableSeeder::class,
            PurchaseTableSeeder::class,
            QuestionaryTableSeeder::class,
            ReviewTableSeeder::class,
            WorkTableSeeder::class,
        ]);
    }
}
