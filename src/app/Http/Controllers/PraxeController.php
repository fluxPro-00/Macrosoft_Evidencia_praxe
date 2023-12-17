<?php

namespace App\Http\Controllers;

use App\Models\Praxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $stav = Praxe::find($id);
        if ($stav === null) {
            return response()->json(['Chyba' => 'Prax neexistuje'], 404);
        }
        return $stav->only(['idPraxe', 'TypZmluvy']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Praxe $praxe)
    {
        //
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
