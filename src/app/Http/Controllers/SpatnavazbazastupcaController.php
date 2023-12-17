<?php

namespace App\Http\Controllers;

use App\Models\Spatnavazbazastupca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SpatnavazbazastupcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Spatnavazbazastupca::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Obsah' => 'required',
            'zastupcafirmy_idZastupcaFirmy' => 'required',
            'veduci_idVeduci' => 'required',
            'praxe_idPraxe' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['Chyba' => 'Zle zadané údaje'], 422);
        }

        $validatedData = $request->validate([
            'Obsah' => 'required|string',
            'zastupcafirmy_idZastupcaFirmy' => 'required|int',
            'veduci_idVeduci' => 'required|int',
            'praxe_idPraxe' => 'required|int',
        ]);

        $spatnavazba = Spatnavazbazastupca::create($validatedData);

        return response()->json(['Správa' => 'Spätná väzba bola pridaná do databázy'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $spatnavazba = Spatnavazbazastupca::find($id);
        if ($spatnavazba === null) {
            return response()->json(['Chyba' => 'Spätná väzba neexistuje'], 404);
        }
        return $spatnavazba;
    }

    public function zastupca($id)
    {
        $spatnavazbazastupca = Spatnavazbazastupca::where('zastupcafirmy_idZastupcaFirmy', $id)->get();
        if ($spatnavazbazastupca->isEmpty()) {
            return response()->json(['Chyba' => 'Zástupca firmy neexistuje alebo nemá spätnú väzbu'], 404);
        }
        return Spatnavazbazastupca::where('zastupcafirmy_idZastupcaFirmy', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spatnavazbazastupca $spatnavazbazastupca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spatnavazbazastupca $spatnavazbazastupca)
    {
        //
    }
}
