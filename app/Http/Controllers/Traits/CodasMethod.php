<?php
 
namespace App\Http\Controllers\Traits;

use App\participant;
use App\participant2;
use App\codascriteria;
use App\pkhcriteria;

use Illuminate\Support\Facades\DB;
 
trait CodasMethod
{    
    public function codascount()
    {
        set_time_limit(0);
        //Menarik array dari database
        // $codascriterias = codascriteria::where('active', 1)->get();
        $codascriterias = DB::select('select * from codascriterias where active = 1');
        $participants = DB::select('select * from participants where status_verifikasi = 1');
        //
        //Normalisasi Bobot Kriteria
        $wt = array_sum(array_column($codascriterias,'weight'));
        foreach ($codascriterias as $codascriteria) {
            $wj = $codascriteria->weight / $wt;
            codascriteria::where('id', $codascriteria->id)->update([
                'weightnormal' => $wj,
            ]);
        }
        //
        // Menghitung Nilai Performa Terbobot Ternormalisasi (rij)
        foreach ($participants as $participant) {
            foreach ($codascriterias as $codascriteria) {
                $xij = $this->xijselect($codascriteria, $participant);
                $xijmax = DB::table('participants')->max($this->criteriaselect($codascriteria)) + 1;
                $xijmin = DB::table('participants')->min($this->criteriaselect($codascriteria)) + 1;
                // Normalisasi Nilai Performa
                if($codascriteria->type == 1)
                    {
                        $nij = $xij / $xijmax;
                    }
                else
                    {
                        $nij = $xijmin / $xij;
                    }
                //
                // Pembobotan Nilai Performa Ternormalisasi
                $wj = $codascriteria->weightnormal;
                //
                // Input rij ke database
                $rij = $wj * $nij;
                participant::where('id', $participant->id)->update([
                    $this->rijselect($codascriteria->id) => $rij,
                ]);
                //
            }
        }
        //
        // Menghitung Jarak Euclidean & Taxicab Alternatif Terhadap Solusi Ideal-Negatif
        foreach ($participants as $participant) {
            $eit = 0;
            $Ti = 0;
            foreach ($codascriterias as $codascriteria) {
                $rij = $this->rjselect($codascriteria, $participant);
                // Menentukan Solusi Ideal-Negatif (nsj)
                $nsj = DB::table('participants')->min($this->rijselect($codascriteria->id));
                //
                $ei = pow( ($rij - $nsj) , 2 );
                $eit = $eit + $ei;
                $ti = abs($rij-$nsj);
                $Ti = $Ti + $ti;
            }
            $Ei = sqrt($eit);
            participant::where('id', $participant->id)->update([
                'Ei' => $Ei,
                'Ti' => $Ti, 
            ]);
        }
        //
        // Menghitung Matriks Penilaian Relatif (Ra) dan Hasil Penilaian (Hi) pada alternatif
        // Fungsi dipisah karena memerlukan waktu eksekusi yang sangat panjang
        $this->countrh();
        //
        // Perhitungan Kuota Seleksi
        $count = DB::table('participants')->where('status_verifikasi', 1)->count();
        $kuota = DB::table('variablesets')->where('id', '1')->value('quota');
        $quota = ($kuota * $count)/100;
        //
        // Proses Perankingan, Penentuan Hasil Seleksi, & Perhitungan Nilai Bantuan
        $i=1;
        $rankedlist = participant::orderBy('Hi', 'desc')->get();
        $pkh1 = DB::table('pkhcriterias')->where('id', '1')->value('bantuan');
        $pkh2 = DB::table('pkhcriterias')->where('id', '2')->value('bantuan');
        $pkh3 = DB::table('pkhcriterias')->where('id', '3')->value('bantuan');
        $pkh4 = DB::table('pkhcriterias')->where('id', '4')->value('bantuan');
        $pkh5 = DB::table('pkhcriterias')->where('id', '5')->value('bantuan');
        $pkh6 = DB::table('pkhcriterias')->where('id', '6')->value('bantuan');
        $pkh7 = DB::table('pkhcriterias')->where('id', '7')->value('bantuan');
        foreach ($rankedlist as $participant){
            $pkhtotal = $pkh1*$participant->ibu_hamil + $pkh2*$participant->usia_dini + $pkh3*$participant->anak_sd + $pkh4*$participant->anak_smp + $pkh5*$participant->anak_sma + $pkh6*$participant->disabilitas_berat + $pkh7*$participant->lanjut_usia;
            if($participant->status_verifikasi == 1)
            {
                if($i <= $quota) 
                {
                    $status = 1;
                    if($pkhtotal > 0)
                    {
                        $pkhstatus = 1;
                        $nilaibantuan = $pkhtotal;
                    }
                    else
                    {
                        $pkhstatus = 0;
                        $nilaibantuan = 0;
                    }
                }
                else 
                {
                    $status = 0;
                    $pkhstatus = 0;
                    $nilaibantuan = 0;
                }
            }
            else
            {
                $status = 0;
                $pkhstatus = 0;
                $nilaibantuan = 0;
                $skiprank = $i;
                $i = NULL;
            }
            
            participant::where('id', $participant->id)->update([
                'rank' => $i,
                'status_codas' => $status,
                'status_pkh' => $pkhstatus,
                'nilai_bantuan' => $nilaibantuan,
            ]);

            if($participant->status_verifikasi == 1)
            {
                $i++;
            }
            else
            {
                $i = $skiprank;
            }
        }
        //
    }

    //
    //
    public function countrh()
    {
        $participants = DB::select('select * from participants where status_verifikasi = 1');
        // Menghitung Matriks Penilaian Relatif (Ra) dan Hasil Penilaian (Hi) pada alternatif
        foreach ($participants as $participant) {
            $Hi = 0;
            $Ei = $participant->Ei;
            $Ti = $participant->Ti;
            foreach ($participants as $participant2) {
                $Ek = $participant2->Ei;
                $Tk = $participant2->Ti;
                $par = DB::table('variablesets')->where('id', '1')->value('parameter');
                $Eik = $Ei - $Ek;
                $hik = $Eik + ($this->abcount($Eik , $par) * ($Ti - $Tk));
                $Hi = $Hi + $hik;
            }
            participant::where('id', $participant->id)->update([
                'Hi' => $Hi,
            ]);
        }
    }


    public function abcount($x, $y)
    {
        if(abs($x) >= $y)
        {
            $z=1;
        }
        else
        {
            $z=0;
        }
        return $z;
    }

    //

    public function xijselect($codascriteria, $participant)
    {
        
        if($codascriteria->id == 1) 
        {
            $xij = $participant->pendapatan + 1;
        }
        elseif($codascriteria->id == 2)
        {
            $xij = $participant->tabungan + 1;
        }
        elseif($codascriteria->id == 3)
        {
            $xij = $participant->luas_bangunan + 1;
        }
        elseif($codascriteria->id == 4)
        {
            $xij = $participant->luas_tanah + 1;
        }
        elseif($codascriteria->id == 5)
        {
            $xij = $participant->fasilitas_bab + 1;
        }
        elseif($codascriteria->id == 6)
        {
            $xij = $participant->jenis_lantai + 1;
        }
        elseif($codascriteria->id == 7)
        {
            $xij = $participant->jenis_dinding + 1;
        }
        elseif($codascriteria->id == 8)
        {
            $xij = $participant->sumber_air_bersih + 1;
        }
        elseif($codascriteria->id == 9)
        {
            $xij = $participant->biaya_pengobatan + 1;
        }
        elseif($codascriteria->id == 10)
        {
            $xij = $participant->pemakaian_listrik + 1;
        }
        elseif($codascriteria->id == 11)
        {
            $xij = $participant->bahan_bakar_masak + 1;
        }
        elseif($codascriteria->id == 12)
        {
            $xij = $participant->konsumsi_dsa + 1;
        }
        elseif($codascriteria->id == 13)
        {
            $xij = $participant->membeli_pakaian + 1;
        }
        elseif($codascriteria->id == 14)
        {
            $xij = $participant->makan_perhari + 1;
        }
        elseif($codascriteria->id == 15)
        {
            $xij = $participant->pendidikan_krt + 1;
        }
        elseif($codascriteria->id == 16)
        {
            $xij = $participant->kendaraan_pribadi + 1;
        }
        return $xij;
    }

    //

    public function rijselect($codascriteria)
    {
        
        if($codascriteria == 1) 
        {
            $rijcolumn = 'ri1';
        }
        elseif($codascriteria == 2)
        {
            $rijcolumn = 'ri2';
        }
        elseif($codascriteria == 3)
        {
            $rijcolumn = 'ri3';
        }
        elseif($codascriteria == 4)
        {
            $rijcolumn = 'ri4';
        }
        elseif($codascriteria == 5)
        {
            $rijcolumn = 'ri5';
        }
        elseif($codascriteria == 6)
        {
            $rijcolumn = 'ri6';
        }
        elseif($codascriteria == 7)
        {
            $rijcolumn = 'ri7';
        }
        elseif($codascriteria == 8)
        {
            $rijcolumn = 'ri8';
        }
        elseif($codascriteria == 9)
        {
            $rijcolumn = 'ri9';
        }
        elseif($codascriteria == 10)
        {
            $rijcolumn = 'ri10';
        }
        elseif($codascriteria == 11)
        {
            $rijcolumn = 'ri11';
        }
        elseif($codascriteria == 12)
        {
            $rijcolumn = 'ri12';
        }
        elseif($codascriteria == 13)
        {
            $rijcolumn = 'ri13';
        }
        elseif($codascriteria == 14)
        {
            $rijcolumn = 'ri14';
        }
        elseif($codascriteria == 15)
        {
            $rijcolumn = 'ri15';
        }
        elseif($codascriteria == 16)
        {
            $rijcolumn = 'ri16';
        }
        return $rijcolumn;
    }

    //

    public function rjselect($codascriteria, $participant)
    {
        
        if($codascriteria->id == 1) 
        {
            $rj = $participant->pendapatan;
        }
        elseif($codascriteria->id == 2)
        {
            $rj = $participant->tabungan;
        }
        elseif($codascriteria->id == 3)
        {
            $rj = $participant->luas_bangunan;
        }
        elseif($codascriteria->id == 4)
        {
            $rj = $participant->luas_tanah;
        }
        elseif($codascriteria->id == 5)
        {
            $rj = $participant->fasilitas_bab;
        }
        elseif($codascriteria->id == 6)
        {
            $rj = $participant->jenis_lantai;
        }
        elseif($codascriteria->id == 7)
        {
            $rj = $participant->jenis_dinding;
        }
        elseif($codascriteria->id == 8)
        {
            $rj = $participant->sumber_air_bersih;
        }
        elseif($codascriteria->id == 9)
        {
            $rj = $participant->biaya_pengobatan;
        }
        elseif($codascriteria->id == 10)
        {
            $rj = $participant->pemakaian_listrik;
        }
        elseif($codascriteria->id == 11)
        {
            $rj = $participant->bahan_bakar_masak;
        }
        elseif($codascriteria->id == 12)
        {
            $rj = $participant->konsumsi_dsa;
        }
        elseif($codascriteria->id == 13)
        {
            $rj = $participant->membeli_pakaian;
        }
        elseif($codascriteria->id == 14)
        {
            $rj = $participant->makan_perhari;
        }
        elseif($codascriteria->id == 15)
        {
            $rj = $participant->pendidikan_krt;
        }
        elseif($codascriteria->id == 16)
        {
            $rj = $participant->kendaraan_pribadi;
        }
        return $rj;
    }

    //

    public function criteriaselect($codascriteria)
    {
        
        if($codascriteria->id == 1) 
        {
            $criteria = 'pendapatan';
        }
        elseif($codascriteria->id == 2)
        {
            $criteria = 'tabungan';
        }
        elseif($codascriteria->id == 3)
        {
            $criteria = 'luas_bangunan';
        }
        elseif($codascriteria->id == 4)
        {
            $criteria = 'luas_tanah';
        }
        elseif($codascriteria->id == 5)
        {
            $criteria = 'fasilitas_bab';
        }
        elseif($codascriteria->id == 6)
        {
            $criteria = 'jenis_lantai';
        }
        elseif($codascriteria->id == 7)
        {
            $criteria = 'jenis_dinding';
        }
        elseif($codascriteria->id == 8)
        {
            $criteria = 'sumber_air_bersih';
        }
        elseif($codascriteria->id == 9)
        {
            $criteria = 'biaya_pengobatan';
        }
        elseif($codascriteria->id == 10)
        {
            $criteria = 'pemakaian_listrik';
        }
        elseif($codascriteria->id == 11)
        {
            $criteria = 'bahan_bakar_masak';
        }
        elseif($codascriteria->id == 12)
        {
            $criteria = 'konsumsi_dsa';
        }
        elseif($codascriteria->id == 13)
        {
            $criteria = 'membeli_pakaian';
        }
        elseif($codascriteria->id == 14)
        {
            $criteria = 'makan_perhari';
        }
        elseif($codascriteria->id == 15)
        {
            $criteria = 'pendidikan_krt';
        }
        elseif($codascriteria->id == 16)
        {
            $criteria = 'kendaraan_pribadi';
        }
        return $criteria;
    }

}