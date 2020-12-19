<?php

use Illuminate\Database\Seeder;

class PKHStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pkhstats')->insert(
            [
                'year' => 2014,
                'receiver' => 2797,
                'budget' => 5548,
            ]
        );
        DB::table('pkhstats')->insert(
            [
                'year' => 2015,
                'receiver' => 3511,
                'budget' => 6471,
            ]
        );
        DB::table('pkhstats')->insert(
            [
                'year' => 2016,
                'receiver' => 5981,
                'budget' => 7795,
            ]
        );
        DB::table('pkhstats')->insert(
            [
                'year' => 2017,
                'receiver' => 6000,
                'budget' => 11340,
            ]
        );
        DB::table('pkhstats')->insert(
            [
                'year' => 2018,
                'receiver' => 10000,
                'budget' => 17520,
            ]
        );
        
    }
}
