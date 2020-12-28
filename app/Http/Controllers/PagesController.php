<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\codascriteria;

use App\pkhcriteria;

use App\participant;

use App\variableset;

class PagesController extends Controller
{
    use Traits\CodasMethod;

    public function login()
    {
        return view('login');
    }
    
    public function dashboard()
    {
        // $participants = participant::all();
        // return view('index', compact('participants'));
        return view('index');
    }

    public function info()
    {
        return view('info');
    }

    public function criteria()
    {
        $codascriterias = codascriteria::all();
        $pkhcriterias = pkhcriteria::all();
        return view('criteria', compact('codascriterias','pkhcriterias'));
    }

    public function codasresult()
    {
        $participants = DB::select('select * from participants where status_verifikasi = 1');
        return view('resultcodas', compact('participants'));
    }

    public function finalresult()
    {
        $participants = DB::select('select * from participants where status_pkh = 1 and status_codas = 1');
        return view('resultfinal',compact('participants'));
    }

    public function codasresultupdate()
    {
        $this->codascount();
        return redirect('/codasresult');
    }

    public function finalresultupdate()
    {
        $this->codascount();
        return redirect('/finalresult');
    }

    public function profilecodas(participant $participant)
    {
        return view('profilecodas', compact('participant'));
    }

    public function profilepkh(participant $participant)
    {
        return view('profilepkh', compact('participant'));
    }

    public function adminpanel()
    {
        $variablesets = variableset::all();
        return view('admpanel', compact('variablesets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
