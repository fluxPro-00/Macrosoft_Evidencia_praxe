<?php

namespace App\Http\Controllers;

use App\Models\Zastupcafirmy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $pouzivatelData['Typ'] = 3;
        $pouzivatelId = DB::table('pouzivatel')->insertGetId($pouzivatelData);

        $validatedData = $request->validate([
            'Meno' => 'required',
            'Priezvisko' => 'required',
            'Email' => 'required',
            'Heslo' => 'required',
            'Tel_cislo' => 'required',
            'Firmy_idFirmy' => 'required'
        ]);
        $validatedData['Pouzivatel_idPouzivatel'] = $pouzivatelId;

        return Zastupcafirmy::create($validatedData);
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
