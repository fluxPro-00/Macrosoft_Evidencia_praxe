<?php

namespace App\Http\Controllers;

use App\Models\Pouzivatel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        //
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
    public function update(Request $request, Pouzivatel $pouzivatel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pouzivatel $pouzivatel)
    {
        //
    }
}
