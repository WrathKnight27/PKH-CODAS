<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class participant2 extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'no_kk', 'nama_krt', 'no_telp', 'email', 
        'alamat_provinsi', 'alamat_kota', 'alamat_kecamatan', 
        'alamat_jalan', 'alamat_gang', 'alamat_no_rumah', 'pendapatan',
        'tabungan', 'hutang', 'luas_tanah', 'luas_bangunan', 'kelayakan_lantai', 'kelayakan_dinding', 
        'kelayakan_atap', 'fasilitas_bab', 'biaya_pengobatan', 'pemakaian_listrik', 
        'sumber_air_bersih', 'konsumsi_dsa', 'makan_perhari', 'pendidikan_krt', 
        'kendaraan_pribadi', 'ibu_hamil', 'usia_dini', 'lanjut_usia', 'anak_sd', 'anak_smp', 'anak_sma', 
        'disabilitas_berat', 'status_verifikasi', 'status_codas', 'status_pkh', 'nilai_bantuan',
        'ri1', 'ri2', 'ri3', 'ri4', 'ri5', 'ri6', 'ri7', 'ri8', 'ri9', 'ri10', 'ri11', 'ri12', 'ri13', 'ri14', 'ri15', 'ri16', 'Ei', 'Ti', 'Hi', 'rank',
     ];
}


