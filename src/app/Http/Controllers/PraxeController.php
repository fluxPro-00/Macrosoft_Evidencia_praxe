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
        return Praxe::find($id);
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
        $praxeFromProgram = DB::table('praxe')->where('Studijneprogramy_idStudijneProgramy', $idProgram)->get();;
        return $praxeFromProgram;
    }
}
