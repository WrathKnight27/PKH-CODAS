<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($n=0;$n<200;$n++){
            DB::table('participants')->insert([
                'no_kk' => Rand(1000000000000000,9999999999999999),
                'nama_krt' => Str::random(7),
                'no_telp' => Rand(100000000000,999999999999),
                'email' => Str::random(10),
                'alamat_provinsi' => Str::random(10),
                'alamat_kota' => Str::random(10),
                'alamat_kecamatan' => Str::random(10),
                'alamat_jalan' => Str::random(10),
                'alamat_gang' => Str::random(10),
                'alamat_no_rumah' => Str::random(3),
                'pendapatan' => Rand(1,7), 
                'tabungan' => Rand(1,7), 
                'hutang' => Rand(1,7), 
                'luas_tanah' => Rand(1,5), 
                'luas_bangunan' => Rand(1,5), 
                'kelayakan_lantai' => Rand(1,2), 
                'kelayakan_dinding' => Rand(1,2), 
                'kelayakan_atap' => Rand(1,2), 
                'fasilitas_bab' => Rand(1,2), 
                'sumber_air_bersih' => Rand(1,3), 
                'biaya_pengobatan' => Rand(1,2),  
                'pemakaian_listrik' => Rand(2,6),   
                'konsumsi_dsa' => Rand(2,5),  
                'makan_perhari' => Rand(2,3), 
                'pendidikan_krt' => Rand(2,7), 
                'kendaraan_pribadi' => Rand(4,6), 
                'ibu_hamil' => Rand(0,1), 
                'usia_dini' => Rand(0,2), 
                'lanjut_usia' => Rand(0,4), 
                'anak_sd' => Rand(0,3), 
                'anak_smp' => Rand(0,2), 
                'anak_sma' => Rand(0,2), 
                'disabilitas_berat' => Rand(0,1), 
                'status_verifikasi' => Rand(0,1), 
                'status_codas' => 0, 
                'status_pkh' => 0,  
                'nilai_bantuan' => 0,
                'ri1' => NULL, 
                'ri2' => NULL, 
                'ri3' => NULL, 
                'ri4' => NULL, 
                'ri5' => NULL,
                'ri6' => NULL, 
                'ri7' => NULL, 
                'ri8' => NULL, 
                'ri9' => NULL, 
                'ri10' => NULL, 
                'ri11' => NULL, 
                'ri12' => NULL, 
                'ri13' => NULL, 
                'ri14' => NULL, 
                'ri15' => NULL, 
                'ri16' => NULL, 
                'Ei' => NULL, 
                'Ti' => NULL, 
                'Hi' => NULL,
                'rank' => NULL,
            ]);
        }
    }
}
