<?php

use Illuminate\Database\Seeder;

class PKHCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pkhcriterias')->insert(
            [
                'name' => 'Ibu Hamil',
                'bantuan' => 3000000,
            ]
        );
        DB::table('pkhcriterias')->insert(
            [
                'name' => 'Anak Usia Dini',
                'bantuan' => 3000000,
            ]
        );
        DB::table('pkhcriterias')->insert(
            [
                'name' => 'Anak SD',
                'bantuan' => 900000,
            ]
        );
        DB::table('pkhcriterias')->insert(
            [
                'name' => 'Anak SMP',
                'bantuan' => 1500000,
            ]
        );
        DB::table('pkhcriterias')->insert(
            [
                'name' => 'Anak SMA',
                'bantuan' => 2000000,
            ]
        );
        DB::table('pkhcriterias')->insert(
            [
                'name' => 'Disabilitas Berat',
                'bantuan' => 2400000,
            ]
        );
        DB::table('pkhcriterias')->insert(
            [
                'name' => 'Lanjut Usia',
                'bantuan' => 2400000,
            ]
        );
        
    }
}
