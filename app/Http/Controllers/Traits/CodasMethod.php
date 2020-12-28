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
                $xijmax = DB::table('participants')->max($this->criteriaselect($codascriteria));
                $xijmin = DB::table('participants')->min($this->criteriaselect($codascriteria));
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
                $rij = $this->rjselect($codascriteria->id, $participant);
                // Menentukan Solusi Ideal-Negatif (nsj)
                $nsj = DB::table('participants')->where('status_verifikasi', 1)->min($this->rijselect($codascriteria->id));
                //
                $rsjnsj = $rij - $nsj;
                $ei = pow($rsjnsj , 2);
                $eit = $eit + $ei;
                $tit = abs($rsjnsj);
                $Ti = $Ti + $tit;
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
        // Penentuan Metode Budgeting Seleksi
        $count = DB::table('participants')->where('status_verifikasi', 1)->count();
        $kuotapersen = DB::table('variablesets')->where('id', '1')->value('percentquota');
        $kuotajumlah = DB::table('variablesets')->where('id', '1')->value('numberquota');
        $kuotabudget = DB::table('variablesets')->where('id', '1')->value('budgetquota');
        $method = DB::table('variablesets')->where('id', '1')->value('method');
        if ($method == 1){
            $quota = ($kuotapersen * $count)/100;
        } elseif ($method == 2) {
            $quota = $kuotajumlah;
        } else {
            $quota = $kuotabudget;
        }
        
        //
        // Proses Perankingan, Penentuan Hasil Seleksi, & Perhitungan Nilai Bantuan
        $i=1;
        $rankedlist = participant::orderBy('Hi', 'desc')->get();
        $pkh1 = DB::table('pkhcriterias')->where('id', '1')->value('bantuan');
        $pkh2 = DB::table('pkhcriterias')->where('id', '2')->value('bantuan');
        $pkh3 = DB::table('pkhcriterias')->where('id', '6')->value('bantuan');
        $pkh4 = DB::table('pkhcriterias')->where('id', '7')->value('bantuan');
        $pkh5 = DB::table('pkhcriterias')->where('id', '5')->value('bantuan');
        $pkh6 = DB::table('pkhcriterias')->where('id', '4')->value('bantuan');
        $pkh7 = DB::table('pkhcriterias')->where('id', '3')->value('bantuan');
        
        $pkhinitial = 550000;
        $pkhtotal = 0;
        $tempbudget = 0;
        foreach ($rankedlist as $participant){
            $npkhlimit = 4;
            if($participant->ibu_hamil >= $npkhlimit){
                $pkhtotal = $pkhinitial + $npkhlimit*$pkh1;
            }
            else {
                $pkhtotal = $pkhinitial + $participant->ibu_hamil*$pkh1;
                $npkhlimit = $npkhlimit - $participant->ibu_hamil;
                if($npkhlimit > 0){
                    if($participant->usia_dini >= $npkhlimit){
                        $pkhtotal = $pkhtotal + $npkhlimit*$pkh2;
                    }
                    else {
                        $pkhtotal = $pkhtotal + $participant->usia_dini*$pkh2;
                        $npkhlimit = $npkhlimit - $participant->usia_dini;
                        if($npkhlimit > 0){
                            if($participant->disabilitas_berat >= $npkhlimit){
                                $pkhtotal = $pkhtotal + $npkhlimit*$pkh3;
                            }
                            else {
                                $pkhtotal = $pkhtotal + $participant->disabilitas_berat*$pkh3;
                                $npkhlimit = $npkhlimit - $participant->disabilitas_berat;
                                if($npkhlimit > 0){
                                    if($participant->lanjut_usia >= $npkhlimit){
                                        $pkhtotal = $pkhtotal + $npkhlimit*$pkh4;
                                    }
                                    else {
                                        $pkhtotal = $pkhtotal + $participant->lanjut_usia*$pkh4;
                                        $npkhlimit = $npkhlimit - $participant->lanjut_usia;
                                        if($npkhlimit > 0){
                                            if($participant->anak_sma >= $npkhlimit){
                                                $pkhtotal = $pkhtotal + $npkhlimit*$pkh5;
                                            }
                                            else {
                                                $pkhtotal = $pkhtotal + $participant->anak_sma*$pkh5;
                                                $npkhlimit = $npkhlimit - $participant->anak_sma;
                                                if($npkhlimit > 0){
                                                    if($participant->anak_smp >= $npkhlimit){
                                                        $pkhtotal = $pkhtotal + $npkhlimit*$pkh6;
                                                    }
                                                    else {
                                                        $pkhtotal = $pkhtotal + $participant->anak_smp*$pkh6;
                                                        $npkhlimit = $npkhlimit - $participant->anak_smp;
                                                        if($npkhlimit > 0){
                                                            if($participant->anak_sd >= $npkhlimit){
                                                                $pkhtotal = $pkhtotal + $npkhlimit*$pkh7;
                                                            }
                                                            else {
                                                                $pkhtotal = $pkhtotal + $participant->anak_sd*$pkh7;
                                                                $npkhlimit = 4;
                                                                
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
            
        
            if($participant->status_verifikasi == 1)
            {
                if($method <= 2){    
                    if($i <= $quota) 
                    {
                        $status = 1;
                        if($pkhtotal > 550000)
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
                } else {
                    if (($quota - $pkhtotal) >= 0){
                        $status = 1;
                        if($pkhtotal > 0)
                        {
                            $pkhstatus = 1;
                            $nilaibantuan = $pkhtotal;
                            $quota = $quota - $nilaibantuan;
                        }
                        else
                        {
                            $pkhstatus = 0;
                            $nilaibantuan = 0;
                        }
                    } else {
                        $status = 0;
                        $pkhstatus = 0;
                        $nilaibantuan = 0;
                    }
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
        $iterasi = DB::table('participants')->where('status_verifikasi', 1)->count();
        // Menghitung Matriks Penilaian Relatif (Ra) dan Hasil Penilaian (Hi) pada alternatif
        foreach ($participants as $participant) {
            $Hi = 0;
            $Ei = $participant->Ei;
            $Ti = $participant->Ti;
            $i = 1;
            while ($i <= $iterasi) {
                $par = DB::table('variablesets')->where('id', '1')->value('parameter');
                $Ek = DB::table('participants')->where('id', $i)->value('Ei');
                $Tk = DB::table('participants')->where('id', $i)->value('Ti');
                $Tik = $Ti - $Tk;
                $Eik = abs($Ei - $Ek);
                if($Eik >= $par)
                {
                    $ab = 1;
                }
                elseif($Eik < $par)
                {
                    $ab = 0;
                }
                $hik = ($Ei - $Ek) + ($ab * $Tik);
                $Hi = $Hi + $hik;
                $i++;
            }
            participant::where('id', $participant->id)->update([
                'Hi' => $Hi,
            ]);
        }
    }


    //

    public function xijselect($codascriteria, $participant)
    {
        
        if($codascriteria->id == 1) 
        {
            $xij = $participant->pendapatan;
        }
        elseif($codascriteria->id == 2)
        {
            $xij = $participant->tabungan;
        }
        elseif($codascriteria->id == 3)
        {
            $xij = $participant->hutang;
        }
        elseif($codascriteria->id == 4)
        {
            $xij = $participant->luas_bangunan;
        }
        elseif($codascriteria->id == 5)
        {
            $xij = $participant->luas_tanah;
        }
        elseif($codascriteria->id == 6)
        {
            $xij = $participant->fasilitas_bab;
        }
        elseif($codascriteria->id == 7)
        {
            $xij = $participant->kelayakan_lantai;
        }
        elseif($codascriteria->id == 8)
        {
            $xij = $participant->kelayakan_dinding;
        }
        elseif($codascriteria->id == 9)
        {
            $xij = $participant->kelayakan_atap;
        }
        elseif($codascriteria->id == 10)
        {
            $xij = $participant->biaya_pengobatan;
        }
        elseif($codascriteria->id == 11)
        {
            $xij = $participant->pemakaian_listrik;
        }
        elseif($codascriteria->id == 12)
        {
            $xij = $participant->sumber_air_bersih;
        }
        elseif($codascriteria->id == 13)
        {
            $xij = $participant->konsumsi_dsa;
        }
        elseif($codascriteria->id == 14)
        {
            $xij = $participant->makan_perhari;
        }
        elseif($codascriteria->id == 15)
        {
            $xij = $participant->pendidikan_krt;
        }
        elseif($codascriteria->id == 16)
        {
            $xij = $participant->kendaraan_pribadi;
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

    public function rjselect($c, $p)
    {
        
        if($c == 1) 
        {
            $rj = $p->ri1;
        }
        elseif($c == 2)
        {
            $rj = $p->ri2;
        }
        elseif($c == 3)
        {
            $rj = $p->ri3;
        }
        elseif($c == 4)
        {
            $rj = $p->ri4;
        }
        elseif($c == 5)
        {
            $rj = $p->ri5;
        }
        elseif($c == 6)
        {
            $rj = $p->ri6;
        }
        elseif($c == 7)
        {
            $rj = $p->ri7;
        }
        elseif($c == 8)
        {
            $rj = $p->ri8;
        }
        elseif($c == 9)
        {
            $rj = $p->ri9;
        }
        elseif($c == 10)
        {
            $rj = $p->ri10;
        }
        elseif($c == 11)
        {
            $rj = $p->ri11;
        }
        elseif($c == 12)
        {
            $rj = $p->ri12;
        }
        elseif($c == 13)
        {
            $rj = $p->ri13;
        }
        elseif($c == 14)
        {
            $rj = $p->ri14;
        }
        elseif($c == 15)
        {
            $rj = $p->ri15;
        }
        elseif($c == 16)
        {
            $rj = $p->ri16;
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
            $criteria = 'hutang';
        }
        elseif($codascriteria->id == 4)
        {
            $criteria = 'luas_bangunan';
        }
        elseif($codascriteria->id == 5)
        {
            $criteria = 'luas_tanah';
        }
        elseif($codascriteria->id == 6)
        {
            $criteria = 'fasilitas_bab';
        }
        elseif($codascriteria->id == 7)
        {
            $criteria = 'kelayakan_lantai';
        }
        elseif($codascriteria->id == 8)
        {
            $criteria = 'kelayakan_dinding';
        }
        elseif($codascriteria->id == 9)
        {
            $criteria = 'kelayakan_atap';
        }
        elseif($codascriteria->id == 10)
        {
            $criteria = 'biaya_pengobatan';
        }
        elseif($codascriteria->id == 11)
        {
            $criteria = 'pemakaian_listrik';
        }
        elseif($codascriteria->id == 12)
        {
            $criteria = 'sumber_air_bersih';
        }
        elseif($codascriteria->id == 13)
        {
            $criteria = 'konsumsi_dsa';
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