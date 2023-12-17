<?php

namespace App\Http\Controllers;

use App\Models\Praxe;
use App\Models\Archivovane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PraxeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Praxe::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prax = Praxe::find($id);
        if ($prax === null) {
            return response()->json(['Chyba' => 'Prax neexistuje'], 404);
        }
        return $prax;
    }

    public function stav($id)
    {
        $stav = Praxe::find($id);
        if ($stav === null) {
            return response()->json(['Chyba' => 'Prax neexistuje'], 404);
        }
        return $stav->only(['idPraxe', 'Stav']);
    }

    public function typ($id)
    {
        $typ = Praxe::find($id);
        if ($typ === null) {
            return response()->json(['Chyba' => 'Prax neexistuje'], 404);
        }
        return $typ->only(['idPraxe', 'TypZmluvy']);
    }

    public function studenti($id)
    {
        return Praxe::find($id)->studentis()->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Praxe $praxe)
    {
        //
    }

    public function archivovat($id)
    {
        $praxe = Praxe::find($id);
        if ($praxe === null) {
            return response()->json(['Chyba' => 'Prax neexistuje'], 404);
        }

        if ($praxe['Stav'] == 'Archivovana') {
            return response()->json(['Chyba' => 'Prax už je archivovaná'], 409);
        }

        $praxe->update(['Stav' => 'Archivovana']);
        $archivovane = Archivovane::create(['Datum' => now()->toDateString(), 'praxe_idPraxe' => $id]);

        return response()->json(['Správa' => 'Prax bola archivovaná'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Praxe $praxe)
    {
        //
    }

    public function praxFromProgram($idProgram)
    {
        $praxeFromProgram = DB::table('praxe')->where('Studijneprogramy_idStudijneProgramy', $idProgram)->get();
        return $praxeFromProgram;
    }

    public function schvalene() {
        $schvalene = DB::table('praxe')->where('Stav', 'Schvalena')->get();
        return $schvalene;
    }

    public function archivovane() {
        $archivovane = DB::table('praxe')->where('Stav', 'Archivovana')->get();
        return $archivovane;
    }
}
