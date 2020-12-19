<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\codascriteria;
use App\pkhcriteria;

class CriteriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(codascriteria $codascriteria)
    {
        return view('criteriaedit', compact('codascriteria'));
    }

    public function pkhedit(pkhcriteria $pkhcriteria)
    {
        return view('criteriapkhedit', compact('pkhcriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, codascriteria $codascriteria)
    {
        codascriteria::where('id', $codascriteria->id)->update([
            'weight' => $request->bobot,
            'active' => $request->aktif,
            'type' => $request->tipe
            ]);
        return redirect('/criteria');
    }

    public function pkhupdate(Request $request, pkhcriteria $pkhcriteria)
    {
        pkhcriteria::where('id', $pkhcriteria->id)->update([
            'bantuan' => $request->nilaibantuan,
            ]);
        return redirect('/criteria');
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
