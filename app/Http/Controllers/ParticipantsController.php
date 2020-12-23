<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\participant;
use App\variableset;
use PDF;

use Illuminate\Support\Facades\DB;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = participant::all();
        return view('participant', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participantnew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('participants')->insert([
            'nama_krt' => $request->nama_krt,
            'no_kk' => $request->no_kk,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'alamat_jalan' => $request->alamat_jalan,
            'alamat_gang' => $request->alamat_gang,
            'alamat_no_rumah' => $request->alamat_no_rumah,
            'alamat_kota' => $request->alamat_kota,
            'alamat_kecamatan' => $request->alamat_kecamatan,
            'alamat_provinsi' => $request->alamat_provinsi,
            'pendapatan' => $request->pendapatan,
            'tabungan' => $request->tabungan,
            'luas_bangunan' => $request->luas_bangunan,
            'luas_tanah' => $request->luas_tanah,
            'jenis_lantai' => $request->jenis_lantai,
            'jenis_dinding' => $request->jenis_dinding,
            'fasilitas_bab' => $request->fasilitas_bab,
            'sumber_air_bersih' => $request->sumber_air_bersih,
            'biaya_pengobatan' => $request->biaya_pengobatan,
            'pemakaian_listrik' => $request->pemakaian_listrik,
            'bahan_bakar_masak' => $request->bahan_bakar_masak,
            'konsumsi_dsa' => $request->konsumsi_dsa,
            'membeli_pakaian' => $request->membeli_pakaian,
            'makan_perhari' => $request->makan_perhari,
            'pendidikan_krt' => $request->pendidikan_krt,
            'kendaraan_pribadi' => $request->kendaraan_pribadi,
            'ibu_hamil' => $request->ibu_hamil,
            'usia_dini' => $request->usia_dini,
            'anak_sd' => $request->anak_sd,
            'anak_smp' => $request->anak_smp,
            'anak_sma' => $request->anak_sma,
            'disabilitas_berat' => $request->disabilitas_berat,
            'lanjut_usia' => $request->lanjut_usia,
            'status_verifikasi' => $request->status_verifikasi
        ]);
        return redirect('/participants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(participant $participant)
    {
        // $participant = participant::all();
        return view('profile', compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(participant $participant)
    {
        return view('participantedit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, participant $participant)
    {
        participant::where('id', $participant->id)->update([
            'nama_krt' => $request->nama_krt,
            'no_kk' => $request->no_kk,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'alamat_jalan' => $request->alamat_jalan,
            'alamat_gang' => $request->alamat_gang,
            'alamat_no_rumah' => $request->alamat_no_rumah,
            'alamat_kota' => $request->alamat_kota,
            'alamat_kecamatan' => $request->alamat_kecamatan,
            'alamat_provinsi' => $request->alamat_provinsi,
            'pendapatan' => $request->pendapatan,
            'tabungan' => $request->tabungan,
            'luas_bangunan' => $request->luas_bangunan,
            'luas_tanah' => $request->luas_tanah,
            'jenis_lantai' => $request->jenis_lantai,
            'jenis_dinding' => $request->jenis_dinding,
            'fasilitas_bab' => $request->fasilitas_bab,
            'sumber_air_bersih' => $request->sumber_air_bersih,
            'biaya_pengobatan' => $request->biaya_pengobatan,
            'pemakaian_listrik' => $request->pemakaian_listrik,
            'bahan_bakar_masak' => $request->bahan_bakar_masak,
            'konsumsi_dsa' => $request->konsumsi_dsa,
            'membeli_pakaian' => $request->membeli_pakaian,
            'makan_perhari' => $request->makan_perhari,
            'pendidikan_krt' => $request->pendidikan_krt,
            'kendaraan_pribadi' => $request->kendaraan_pribadi,
            'ibu_hamil' => $request->ibu_hamil,
            'usia_dini' => $request->usia_dini,
            'anak_sd' => $request->anak_sd,
            'anak_smp' => $request->anak_smp,
            'anak_sma' => $request->anak_sma,
            'disabilitas_berat' => $request->disabilitas_berat,
            'lanjut_usia' => $request->lanjut_usia,
            'status_verifikasi' => $request->status_verifikasi,
            'nilai_codas' => 0
        ]);
        return redirect('/participants');
    }

    
    public function destroy(participant $participant)
    {
        participant::destroy($participant->id);
        return redirect('/participants');
    }

    public function countreset()
    {
        $participants = participant::all();
        foreach ($participants as $participant){
            participant::where('id', $participant->id)->update([
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
                'status_codas' => 0,
                'status_pkh' => 0,
                'nilai_bantuan' => 0,
            ]);
        }
        return redirect('/adminpanel');
    }

    public function variableedit(Request $request)
    {
        $variablesets = variableset::all();
        if($request->budgeting == 1){
            variableset::where('id', 1)->update([
                'parameter' => $request->parameter,
                'method' => $request->budgeting,
                'percentquota' => $request->percent,
            ]);
        } elseif ($request->budgeting == 2){
            variableset::where('id', 1)->update([
                'parameter' => $request->parameter,
                'method' => $request->budgeting,
                'numberquota' => $request->number,
            ]);
        } elseif ($request->budgeting == 3) {
            variableset::where('id', 1)->update([
                'parameter' => $request->parameter,
                'method' => $request->budgeting,
                'budgetquota' => $request->budget,
            ]);
        } else {
            variableset::where('id', 1)->update([
                'parameter' => $request->parameter,
            ]);
        }
        
        return redirect('/adminpanel');
    }

    public function verifdata(Request $request)
    {
        $participants = participant::all()->random()->get();
        $n = $request->verifnumber;
        foreach ($participants as $participant){
            if ($n > 0){
                participant::where('id', $participant->id)->update([
                    'status_verifikasi' => 1,
                ]);
                $n = $n - 1;
            } else {
                participant::where('id', $participant->id)->update([
                    'status_verifikasi' => 0,
                ]);
            }
        }
    	return redirect('/adminpanel');
    }

    public function printcodas()
    {
        $codasresults = DB::select('select * from participants where status_codas = 1 order by rank asc');
        // return view('resultcodas', compact('codasresult'));
        $pdf = PDF::loadview('reportcodas',['codasresults'=>$codasresults]);
    	return $pdf->download('laporan-seleksi-codas.pdf');
    }

    public function printfinal()
    {
    	$finalresults = DB::select('select * from participants where status_pkh = 1 order by rank asc');
 
    	$pdf = PDF::loadview('reportpkh',['finalresults'=>$finalresults]);
    	return $pdf->download('laporan-seleksi-pkh.pdf');
    }

}
