<?php

namespace App\Http\Controllers;

use App\Models\Firmy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //
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
    public function update(Request $request, Firmy $firmy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Firmy $firmy)
    {
        //
    }
}
