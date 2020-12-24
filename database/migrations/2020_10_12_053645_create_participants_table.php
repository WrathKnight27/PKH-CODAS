<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->biginteger('no_kk');
            $table->string('nama_krt');
            $table->biginteger('no_telp');
            $table->string('email');
            $table->string('alamat_provinsi');
            $table->string('alamat_kota');
            $table->string('alamat_kecamatan');
            $table->string('alamat_jalan');
            $table->string('alamat_gang');
            $table->string('alamat_no_rumah');
            $table->integer('pendapatan');
            $table->integer('tabungan');
            $table->integer('luas_bangunan');
            $table->integer('luas_tanah');
            $table->integer('fasilitas_bab');
            $table->integer('jenis_lantai');
            $table->integer('jenis_dinding');
            $table->integer('sumber_air_bersih');
            $table->integer('biaya_pengobatan');
            $table->integer('pemakaian_listrik');
            $table->integer('bahan_bakar_masak');
            $table->integer('konsumsi_dsa');
            $table->integer('membeli_pakaian');
            $table->integer('makan_perhari');
            $table->integer('pendidikan_krt');
            $table->integer('kendaraan_pribadi');
            $table->integer('ibu_hamil');
            $table->integer('usia_dini');
            $table->integer('lanjut_usia');
            $table->integer('anak_sd');
            $table->integer('anak_smp');
            $table->integer('anak_sma');
            $table->integer('disabilitas_berat');
            $table->boolean('status_verifikasi');
            $table->boolean('status_codas')->default('0');;
            $table->boolean('status_pkh')->default('0');;
            $table->integer('nilai_bantuan')->default('0');
            $table->decimal('ri1',10,7)->nullable()->default(NULL);
            $table->decimal('ri2',10,7)->nullable()->default(NULL);
            $table->decimal('ri3',10,7)->nullable()->default(NULL);
            $table->decimal('ri4',10,7)->nullable()->default(NULL);
            $table->decimal('ri5',10,7)->nullable()->default(NULL);
            $table->decimal('ri6',10,7)->nullable()->default(NULL);
            $table->decimal('ri7',10,7)->nullable()->default(NULL);
            $table->decimal('ri8',10,7)->nullable()->default(NULL);
            $table->decimal('ri9',10,7)->nullable()->default(NULL);
            $table->decimal('ri10',10,7)->nullable()->default(NULL);
            $table->decimal('ri11',10,7)->nullable()->default(NULL);
            $table->decimal('ri12',10,7)->nullable()->default(NULL);
            $table->decimal('ri13',10,7)->nullable()->default(NULL);
            $table->decimal('ri14',10,7)->nullable()->default(NULL);
            $table->decimal('ri15',10,7)->nullable()->default(NULL);
            $table->decimal('ri16',10,7)->nullable()->default(NULL);
            $table->decimal('Ei',10,7)->nullable()->default(NULL);
            $table->decimal('Ti',10,7)->nullable()->default(NULL);
            $table->decimal('Hi',10,7)->nullable()->default(NULL);
            $table->integer('rank')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
