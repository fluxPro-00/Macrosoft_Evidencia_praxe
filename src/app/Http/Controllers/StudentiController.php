<?php

namespace App\Http\Controllers;

use App\Models\Studenti;
use App\Models\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Studenti::all();
    }

    public function osvedcenia()
    {
        $studenti = DB::table('studenti')->select(['idStudenti', 'Osvedcenia'])->get();

        return $studenti;
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
            'RokStudia' => 'required',
            'Stupen' => 'required',
            'AkademickyRok' => 'required',
            'Osvedcenia' => 'required',
            'SchvalenyVykaz' => 'required',
            'studijneprogramy_idStudijneProgramy' => 'required',
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
        $pouzivatelData['Typ'] = 1;

        $najdiPouzivatela = Pouzivatel::where('Email', $pouzivatelData['Email'])->first();

        if ($najdiPouzivatela) {
            return response()->json(['Chyba' => 'Používateľ už existuje'], 409);
        }

        $pouzivatelId = DB::table('pouzivatel')->insertGetId($pouzivatelData);

        $studentiData = $request->validate([
            'RokStudia' => 'required',
            'Stupen' => 'required',
            'AkademickyRok' => 'required',
            'Osvedcenia' => 'required',
            'SchvalenyVykaz' => 'required',
            'studijneprogramy_idStudijneProgramy' => 'required',
        ]);
        $studentiData['pouzivatel_idPouzivatel'] = $pouzivatelId;

        return Studenti::create($studentiData);
    }

    public function show($id)
    {
        return Studenti::find($id);
    }

    public function destroy($id)
    {
        $student = Studenti::findOrFail($id);

        $student->delete();
    }
    public function update(Request $request, $id)
    {
        $student = Studenti::findOrFail($id);

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            if ($student->isFillable($key)) {
                $student->{$key} = $value;
            }
        }

        $student->save();

        return response()->json(['Správa' => 'Študent bol aktualizovaný', 'data' => $student->fresh()], 200);
    }
}
