<?php

use Illuminate\Database\Seeder;

class CodasCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codascriterias')->insert(
            [
                'name' => 'Penghasilan',
                'weight' => 10,
                'weightnormal' => '9',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Tabungan',
                'weight' => 8,
                'weightnormal' => '9',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Hutang',
                'weight' => 8,
                'weightnormal' => '9',
                'active' => 1,
                'type' => 1,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Luas Bangunan',
                'weight' => 7,
                'weightnormal' => '7',  
                'active' => 1,
                'type' => 0,              
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Luas Tanah',
                'weight' => 7,
                'weightnormal' => '7',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Fasilitas BAB',
                'weight' => 8,
                'weightnormal' => '8',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Kelayakan Lantai Rumah',
                'weight' => 6,
                'weightnormal' => '6',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Kelayakan Dinding Rumah',
                'weight' => 6,
                'weightnormal' => '6',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Kelayakan Atap Rumah',
                'weight' => 6,
                'weightnormal' => '6',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Biaya Pengobatan',
                'weight' => 10,
                'weightnormal' => '10',
                'active' => 1,
                'type' => 1,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Kebutuhan Listrik',
                'weight' => 6,
                'weightnormal' => '6',
                'active' => 1,
                'type' => 1,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Sumber Air Bersih',
                'weight' => 10,
                'weightnormal' => '10',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Konsumsi Daging Susu Ayam',
                'weight' => 8,
                'weightnormal' => '8',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Makan Perhari',
                'weight' => 7,
                'weightnormal' => '7',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Pendidikan KRT',
                'weight' => 4,
                'weightnormal' => '4',
                'active' => 1,
                'type' => 0,
            ]
        );
        DB::table('codascriterias')->insert(
            [
                'name' => 'Kendaraan Pribadi',
                'weight' => 6,
                'weightnormal' => '6',
                'active' => 1,
                'type' => 0,
            ]
        );
    }
}
