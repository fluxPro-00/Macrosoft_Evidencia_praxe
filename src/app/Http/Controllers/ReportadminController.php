<?php

namespace App\Http\Controllers;

use App\Models\Administratori;
use App\Models\Reportadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reportadmin::all();
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Obsah' => 'required',
            'administratori_idAdministratori' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['Chyba' => 'Zle zadané údaje'], 422);
        }

        $validatedData = $request->validate([
            'Obsah' => 'required|string',
            'administratori_idAdministratori' => 'required|int',

        ]);

        $adminreport = Reportadmin::create($validatedData);

        return response()->json(['Správa' => 'Report bol pridaný do databázy'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reportadmin = Reportadmin::find($id);
        if ($reportadmin === null) {
            return response()->json(['Chyba' => 'Report od administrátora neexistuje'], 404);
        }
        return $reportadmin;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reportadmin $reportadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reportadmin $reportadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reportadmin $reportadmin)
    {
        //
    }
    public function admin($id)
    {
        $admin = Reportadmin::where('administratori_idAdministratori', $id)->get();
        if ($admin->isEmpty()) {
            return response()->json(['Chyba' => 'Administrátor neexistuje alebo nemá spätnú väzbu'], 404);
        }
        return Reportadmin::where('administratori_idAdministratori', $id)->get();
    }
}
