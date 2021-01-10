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
        ParticipantSeeder::class,
        CodasCriteriaSeeder::class,
        PKHCriteriaSeeder::class,
        PKHStatsSeeder::class,
        UserSeeder::class,
        VariableSetSeeder::class,
    ]);
}
}