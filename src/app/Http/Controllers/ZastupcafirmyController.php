<?php

namespace App\Http\Controllers;

use App\Models\Zastupcafirmy;
use App\Models\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ZastupcafirmyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Zastupcafirmy::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Meno' => 'required',
            'Priezvisko' => 'required',
            'Email' => 'required',
            'Heslo' => 'required',
            'Tel_cislo' => 'required',
            'firmy_idFirmy' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['Chyba' => 'Zle zadané údaje'], 422);
        }

        $pouzivatelData = $request->validate([
            'Meno' => 'required',
            'Priezvisko' => 'required',
            'Email' => 'required',
            'Heslo' => 'required',
            'Tel_cislo' => 'required',
        ]);
        $pouzivatelData['Typ'] = 3;

        $najdiPouzivatela = Pouzivatel::where('Email', $pouzivatelData['Email'])->first();

        if ($najdiPouzivatela) {
            return response()->json(['Chyba' => 'Používateľ už existuje'], 409);
        }

        $pouzivatelId = DB::table('pouzivatel')->insertGetId($pouzivatelData);

        $zastupcaData = $request->validate([
            'firmy_idFirmy' => 'required'
        ]);
        $zastupcaData['pouzivatel_idPouzivatel'] = $pouzivatelId;

        return Zastupcafirmy::create($zastupcaData);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Zastupcafirmy::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zastupcafirmy $zastupcafirmy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zastupcafirmy $zastupcafirmy)
    {
        //
    }
}
