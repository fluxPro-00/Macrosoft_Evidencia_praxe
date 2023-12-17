<?php

namespace App\Http\Controllers;

use App\Models\Poverenizamestnanci;
use App\Models\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PoverenizamestnanciController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Poverenizamestnanci::all();
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
            'pracoviska_idPracoviska' => 'required',
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

        $zamestnanecData = $request->validate([
            'pracoviska_idPracoviska' => 'required'
        ]);
        $zamestnanecData['pouzivatel_idPouzivatel'] = $pouzivatelId;

        return Poverenizamestnanci::create($zamestnanecData);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $poverenyzamestnanec = Poverenizamestnanci::find($id);
        if ($poverenyzamestnanec === null) {
            return response()->json(['Chyba' => 'Poverený zamestnanec neexistuje'], 404);
        }
        return $poverenyzamestnanec;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $poverenyzamestnanec = Poverenizamestnanci::find($id);
        if ($poverenyzamestnanec === null) {
            return response()->json(['Chyba' => 'Poverený zamestnanec neexistuje'], 404);
        }

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            if ($poverenyzamestnanec->isFillable($key)) {
                $poverenyzamestnanec->{$key} = $value;
            }
        }

        $poverenyzamestnanec->save();

        return response()->json(['Správa' => 'Poverený zamestnanec bol aktualizovaný', 'data' => $poverenyzamestnanec->fresh()], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poverenizamestnanci $poverenizamestnanci)
    {
        //
    }
}
