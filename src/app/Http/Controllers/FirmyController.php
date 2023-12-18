<?php

namespace App\Http\Controllers;

use App\Models\Firmy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FirmyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Firmy::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nazov' => 'required|string',
            'Adresa' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['Chyba' => 'Zle zadané údaje'], 422);
        }

        $validatedData = $request->validate([
            'Nazov' => 'required|string',
            'Adresa' => 'required|string',
        ]);

        $najdiFirmu = Firmy::where('Nazov', $validatedData['Nazov'])->first();

        if ($najdiFirmu) {
            return response()->json(['Chyba' => 'Firma už existuje'], 409);
        }

        $firmy = Firmy::create($validatedData);

        return response()->json(['Správa' => 'Firma bola pridaná do databázy'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $firma = Firmy::find($id);
        if ($firma === null) {
            return response()->json(['Chyba' => 'Firma neexistuje'], 404);
        }
        return $firma;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $firma = Firmy::findOrFail($id);

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            if ($firma->isFillable($key)) {
                $firma->{$key} = $value;
            }
        }

        $firma->save();

        return response()->json(['Správa' => 'Firma bola aktualizovaná', 'data' => $firma->fresh()], 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $firma = Firmy::findOrFail($id);

        $firma->delete();
    }
}
