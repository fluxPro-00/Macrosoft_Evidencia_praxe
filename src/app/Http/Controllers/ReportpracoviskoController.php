<?php

namespace App\Http\Controllers;

use App\Models\Reportpracovisko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReportpracoviskoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reportpracovisko::all();
    }

    public function indexForPracovisko($idPracovisko)
    {
        $pracovisko = Reportpracovisko::where('pracoviska_idPracoviska', $idPracovisko)->get();
        if ($pracovisko->isEmpty()) {
            return response()->json(['Chyba' => 'Pracovisko neexistuje alebo nemá reporty'], 404);
        }
        return $pracovisko;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Obsah' => 'required|string',
            'pracoviska_idPracoviska' => 'required|integer',
            'veduci_idVeduci1' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['Chyba' => 'Zle zadané údaje'], 422);
        }

        $validatedData = $request->validate([
            'Obsah' => 'required|string',
            'pracoviska_idPracoviska' => 'required|integer',
            'veduci_idVeduci1' => 'required|integer',
        ]);

        $najdiReportpracoviska = Reportpracovisko::where('Obsah', $validatedData['Obsah'])->first();

        if ($najdiReportpracoviska) {
            return response()->json(['Chyba' => 'Report za pracovisko už existuje'], 409);
        }

        $reportpracovisko = Reportpracovisko::create($validatedData);

        return response()->json(['Správa' => 'Report za pracovisko bol pridaný do databázy'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reportpracovisko = Reportpracovisko::find($id);
        if ($reportpracovisko === null) {
            return response()->json(['Chyba' => 'Report pracoviska neexistuje'], 404);
        }
        return $reportpracovisko;
    }

    public function showForPracovisko($idPracovisko, $idReport)
    {
        $pracovisko = Reportpracovisko::where('pracoviska_idPracoviska', $idPracovisko)->where('idreportpracovisko', $idReport)->get();
        if ($pracovisko->isEmpty()) {
            return response()->json(['Chyba' => 'Pracovisko neexistuje alebo nemá reporty'], 404);
        }
        return $pracovisko;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reportpracovisko $reportpracovisko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reportpracovisko $reportpracovisko)
    {
        //
    }
}
