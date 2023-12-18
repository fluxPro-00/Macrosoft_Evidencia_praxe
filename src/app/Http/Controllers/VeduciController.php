<?php

namespace App\Http\Controllers;

use App\Models\Pouzivatel;
use App\Models\Veduci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VeduciController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Veduci::all();
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
        $pouzivatelData['Typ'] = 4;

        $najdiPouzivatela = Pouzivatel::where('Email', $pouzivatelData['Email'])->first();

        if ($najdiPouzivatela) {
            return response()->json(['Chyba' => 'Používateľ už existuje'], 409);
        }

        $pouzivatelId = DB::table('pouzivatel')->insertGetId($pouzivatelData);

        $veduciData['pouzivatel_idPouzivatel'] = $pouzivatelId;

        return Veduci::create($veduciData);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $veduci = Veduci::find($id);
        if ($veduci === null) {
            return response()->json(['Chyba' => 'Vedúci neexistuje'], 404);
        }
        return $veduci;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $veduci = Veduci::findOrFail($id);

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            if ($veduci->isFillable($key)) {
                $veduci->{$key} = $value;
            }
        }

        $veduci->save();

        return response()->json(['Správa' => 'Vedúci bol aktualizovaný', 'data' => $veduci->fresh()], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $veduci = Veduci::findOrFail($id);

        $veduci->delete();
    }
}
