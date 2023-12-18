<?php

namespace App\Http\Controllers;

use App\Models\Pracoviska;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PracoviskaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pracoviska::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nazov' => 'required|string',
            'Adresa' => 'required|string',
            'administratori_idAdministratori' => 'required|int',
            'veduci_idVeduci' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json(['Chyba' => 'Zle zadané údaje'], 422);
        }

        $validatedData = $request->validate([
            'Nazov' => 'required|string',
            'Adresa' => 'required|string',
            'administratori_idAdministratori' => 'required|int',
            'veduci_idVeduci' => 'required|int',
        ]);

        $najdiPracovisko = Pracoviska::where('Nazov', $validatedData['Nazov'])->first();

        if ($najdiPracovisko) {
            return response()->json(['Chyba' => 'Pracovisko už existuje'], 409);
        }

        $pracovisko = Pracoviska::create($validatedData);

        return response()->json(['Správa' => 'Pracovisko bolo pridané do databázy'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pracovisko = Pracoviska::find($id);
        if ($pracovisko === null) {
            return response()->json(['Chyba' => 'Pracovisko neexistuje'], 404);
        }
        return $pracovisko;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pracovisko = Pracoviska::findOrFail($id);

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            if ($pracovisko->isFillable($key)) {
                $pracovisko->{$key} = $value;
            }
        }

        $pracovisko->save();

        return response()->json(['Správa' => 'Pracovisko bolo aktualizované', 'data' => $pracovisko->fresh()], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pracovisko = Pracoviska::findOrFail($id);

        $pracovisko->delete();
    }
}
