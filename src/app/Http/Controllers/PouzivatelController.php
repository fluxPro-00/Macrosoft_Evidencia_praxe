<?php

namespace App\Http\Controllers;

use App\Models\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PouzivatelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pouzivatel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Meno' => 'required|string',
            'Priezvisko' => 'required|string',
            'Email' => 'required|string|email|unique:pouzivatel',
            'Heslo' => 'required|string',
            'Tel_cislo' => 'required|string',
            'Typ' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json(['Chyba' => 'Zle zadané údaje'], 422);
        }

        $pouzivatelData = $request->validate([
            'Meno' => 'required|string',
            'Priezvisko' => 'required|string',
            'Email' => 'required|string|email|unique:pouzivatel',
            'Heslo' => 'required|string',
            'Tel_cislo' => 'required|string',
            'Typ' => 'required|int',
        ]);

        $pouzivatel = Pouzivatel::create([
            'Meno' => $request->Meno,
            'Priezvisko' => $request->Priezvisko,
            'Email' => $request->Email,
            'Heslo' => Hash::make($request->Heslo),
            'Tel_cislo' => $request->Tel_cislo,
            'Typ' => $request->Typ,
        ]);

        return response()->json(['Správa' => 'Používateľ bol zaregistrovaný'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pouzivatel = Pouzivatel::find($id);
        if ($pouzivatel === null) {
            return response()->json(['Chyba' => 'Používateľ neexistuje'], 404);
        }
        return $pouzivatel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pouzivatel = Pouzivatel::find($id);
        if ($pouzivatel === null) {
            return response()->json(['Chyba' => 'Používateľ neexistuje'], 404);
        }

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            if ($pouzivatel->isFillable($key)) {
                if ($key === 'Heslo') {
                    $pouzivatel->{$key} = Hash::make($value);
                } else {
                    $pouzivatel->{$key} = $value;
                }
            }
        }

        $pouzivatel->save();

        return response()->json(['Správa' => 'Používateľ bol aktualizovaný', 'data' => $pouzivatel->fresh()], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pouzivatel = Pouzivatel::findOrFail($id);

        $pouzivatel->delete();
    }
}
